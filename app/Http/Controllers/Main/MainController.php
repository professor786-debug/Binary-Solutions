<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Solution;
use App\Models\Student;
use App\Models\Purchase;
use App\Models\Newsletter;
use App\Models\SubscriptionPackage;
use App\Models\StudentSubscription;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerifyStudentMail;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Facades\Validator;



class MainController extends Controller
{
    public function index()
    {
        return view('main');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact_us()
    {
        return view('contact_us');
    }

    public function category_detail()
    {
        return view('category_detail');
    }

    public function chat(Request $request)
    {
        $query = $request->input('query');

        $results = collect();

        if ($query) {
            $results = Solution::where('subject_area', 'LIKE', "%{$query}%")
                ->orWhere('problem_statement', 'LIKE', "%{$query}%")
                ->orWhere('keywords', 'LIKE', "%{$query}%")
                ->paginate(1)
                ->appends(['query' => $query]);
        }

        return view('chat', compact('query', 'results'));
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function student_register(Request $request)
{
    $messages = [
        'name.unique'  => 'This username already exists. Please choose another.',
        'email.unique' => 'This email is already registered.',
        'contact_no.regex' => 'Contact number must be in international format, e.g. +923001234567.',
        'password.regex'   => 'Password must contain at least 1 letter, 1 number, and 1 special character.'
    ];

    $validator = Validator::make($request->all(), [
        'name'       => 'required|string|unique:students,name',
        'full_name'  => 'required|string|max:255',
        'contact_no' => 'required|string|regex:/^\+\d{7,15}$/',
        'email'      => 'required|email|unique:students,email',
        'password'   => 'required|string|min:6|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@.$!%*#?&]).{6,}$/'
    ], $messages);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors'  => $validator->errors()
        ], 422);
    }

    $validated = $validator->validated();
    $token = Str::random(64);

    $student = Student::create([
        'name'               => $validated['name'],
        'full_name'          => $validated['full_name'],
        'contact_no'         => $validated['contact_no'],
        'email'              => $validated['email'],
        'password'           => bcrypt($validated['password']),
        'verification_token' => $token,
        'is_verified'        => false,
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Verification mail sent sucessfully. Please verify your email...',
        'email'   => $student->email,
        'token'   => $token,
    ]);
}


    public function sendVerificationMail(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');

        Mail::to($email)->send(new VerifyStudentMail($token));

        return response()->json([
            'success' => true,
            'message' => 'Verification email sent.'
        ]);
    }


    public function verifyStudent($token)
    {
        $student = Student::where('verification_token', $token)->first();

        if (!$student) {
            return redirect('/')->with('error', 'Invalid token.');
        }

        $student->update([
            'is_verified' => true,
            'verification_token' => null,
        ]);

        return redirect('/login')->with('success', 'Email verified. You can now login.');
    }

    public function checkLogin(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $solutionId = $request->input('solution_id');

        return redirect()->back()->with('success', 'You are logged in!');
    }


    public function student_login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        $student = Student::with(['latestSubscription.package'])
            ->where('email', $request->name)
            ->orWhere('name', $request->name)
            ->first();

        if (!$student || !Hash::check($request->password, $student->password)) {
            return back()->with('error', 'Invalid credentials.');
        }

        if (!$student->is_verified) {
            return back()->with('error', 'Please verify your email first.');
        }

        Auth::guard('student')->login($student);

        $subscription = $student->latestSubscription;
        if ($subscription && $subscription->end_date >= now()) {
            session(['student_subscription' => $subscription]);
        }

        if (session()->has('from_package_checkout')) {
            session()->forget('from_package_checkout');

            if (session()->has('url.intended')) {
                $url = session()->pull('url.intended');
                return redirect()->to($url)->with('success', 'Logged in successfully. Continue with your package.');
            }

            return redirect()->route('packages')->with('success', 'Logged in. Choose your package.');
        }

        if (session()->has('from_solution_page')) {
            session()->forget('from_solution_page');

            if (session()->has('url.intended')) {
                return redirect()->to(session()->pull('url.intended'))
                    ->with('success', 'Logged in. You can now view the solution.');
            }

            return redirect()->route('solution.detail')->with('success', 'Logged in. You can now view the solution.');
        }

        if (session()->has('url.intended')) {
            return redirect()->to(session()->pull('url.intended'))->with('success', 'Logged in successfully.');
        }

        if ($subscription && $subscription->end_date >= now()) {
            return redirect()->route('main')->with('success', 'Logged in successfully.');
        }

        return redirect()->route('packages')->with('success', 'Logged in successfully. Please buy a subscription.');
    }

    public function student_logout()
    {
        Auth::guard('student')->logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Logged out successfully');
    }

    public function student_dashboard() {}

    public function packages()
    {
        $packages = SubscriptionPackage::all();
        return view('packege', compact('packages'));
    }

    public function show(Request $request)
    {
        $solutionId = $request->get('solution_id');

        if (!$solutionId) {
            return redirect()->back()->with('error', 'Solution ID is missing.');
        }

        $solution = Solution::find($solutionId);

        if (!$solution) {
            return redirect()->back()->with('error', 'Solution not found.');
        }

        $student = Auth::guard('student')->user();
        // dd($student);
        $hasAccess = false;

        if ($student && $student->subscription_id) {
            $hasAccess = true;
        }

        return view('solution_review', compact('solution', 'hasAccess'));
    }

    public function checkout(Request $request)
    {
        if (!Auth::guard('student')->check()) {
            session(['url.intended' => url()->full()]);
            session(['from_solution_checkout' => true]);

            return redirect()->route('login')->with('solution_error', 'To buy a solution, you must log in first.');
        }

        $package = null;
        $solution = null;

        if ($request->has('solution_id')) {
            $solution = Solution::find($request->solution_id);

            if (!$solution) {
                return redirect()->back()->with('error', 'Solution not found.');
            }
        } else {
            $package = SubscriptionPackage::find($request->id);

            if (!$package) {
                return redirect()->back()->with('error', 'Package not found.');
            }
        }
        return view('checkout', [
            'package' => $package,
            'solution' => $solution,
            'stripeKey' => config('services.stripe.key')
        ]);
    }

    public function package_checkout(Request $request)
    {
        if (!Auth::guard('student')->check()) {
            session(['url.intended' => url()->full()]);
            session(['from_package_checkout' => true]);
            return redirect()->route('login')->with('package_error', 'To buy a package, you must log in first.');
        }

        $package = null;
        $solution = null;

        if ($request->has('solution_id')) {
            $solution = Solution::find($request->solution_id);

            if (!$solution) {
                return redirect()->back()->with('error', 'Solution not found.');
            }
        }

        if ($request->has('id')) {
            $package = SubscriptionPackage::find($request->id);

            if (!$package) {
                return redirect()->back()->with('error', 'Package not found.');
            }
        }

        $student = Auth::guard('student')->user();

        return view('package_checkout', [
            'package' => $package,
            'solution' => $solution,
            'stripeKey' => config('services.stripe.key'),
        ]);
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        return response()->json(['success' => 'Thanks for subscribing!']);
    }

    public function handleStripePayment(Request $request)
    {
        $request->validate([
            'package_id' => 'required',
            'stripeToken' => 'required|string',
        ]);

        $student = Auth::guard('student')->user();
        $package = SubscriptionPackage::find($request->package_id);

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => intval($package->price * 100),
                'currency' => 'usd',
                'description' => "Subscription for package: {$package->name}",
                'source' => $request->stripeToken,
            ]);

            StudentSubscription::create([
                'student_id' => $student->id,
                'subscription_plan_id' => $package->id,
                'amount' => $package->price,
                'currency' => 'usd',
                'start_date' => now(),
                'end_date' => now()->addMonth(),
                'stripe_charge_id' => $charge->id,
            ]);

            $student->subscription_id = $package->id;
            $student->save();

            return redirect()->route('student.subscription')->with('success', 'Package purchased successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function handleSolutionStripe(Request $request)
    {
        $request->validate([
            'solution_id' => 'required|exists:solutions,id',
            'stripeToken' => 'required|string',
            'total_amount' => 'required|numeric',
            'addons' => 'nullable|string',
        ]);

        $solution = Solution::findOrFail($request->solution_id);
        $student = Auth::guard('student')->user();
        $package = $student->latestSubscription->package ?? null;

        $basePrice = $solution->price;
        $addonTotal = 0.00;
        $addons = [];

        if ($request->filled('addons')) {
            $addons = explode(',', $request->addons);
            $addonTotal = $request->addon_total ?? 0.00;
        }

        $grandTotal = $request->total_amount;

        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = Charge::create([
                'amount' => intval($grandTotal * 100),
                'currency' => 'usd',
                'description' => "Purchase of solution: {$solution->title}",
                'source' => $request->stripeToken,
                'metadata' => [
                    'student_id' => $student->id,
                    'solution_id' => $solution->id,
                    'package_id' => $package?->id,
                ],
            ]);

            Purchase::create([
                'student_id' => $student->id,
                'solution_id' => $solution->id,
                'package_id' => $package?->id,
                'base_price' => $basePrice,
                'addons' => json_encode($addons),
                'addon_total' => $addonTotal,
                'grand_total' => $grandTotal,
                'payment_status' => 'completed',
                'payment_method' => 'stripe',
                'stripe_charge_id' => $charge->id,
            ]);

            return redirect()->route('student.solutions')->with('success', 'Solution purchased successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function login_confirmation(Request $request)
    {
        if ($request->has('solution')) {
            session(['url.intended' => route('solution.detail', ['solution_id' => $request->solution])]);
            session(['from_solution_page' => true]);
        }

        return redirect()->route('login');
    }

    public function custom_solution()
    {

        return view('custom_solution');
    }
}
