<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubscription;
use Illuminate\Support\Facades\Auth;
use App\Models\Purchase;
use App\Models\RefundRequest;
use App\Models\CustomSolution;
use Illuminate\Support\Facades\Validator;

class StudentAuthController extends Controller
{
public function index()
{
    $student = Auth::guard('student')->user();

    // Purchases
    $purchases = Purchase::with(['solution', 'package'])
        ->where('student_id', $student->id)
        ->get();

    // Solutions Bought
    $solutionsBought = Purchase::where('student_id', $student->id)->count();

    // Latest Subscription (Active/Inactive based on is_active column)
    $latestSubscription = \App\Models\StudentSubscription::where('student_id', $student->id)
        ->latest('id')
        ->first();

    $activeSubscription = ($latestSubscription && $latestSubscription->is_active == 1)
        ? 'Active'
        : 'Inactive';

    // All subscriptions with package info
    $subscriptions = \App\Models\StudentSubscription::where('student_id', $student->id)
        ->with('package')
        ->get();

    $expiryInfo = [];
    $packagesCount = $subscriptions->count();

    if ($packagesCount > 0) {
        foreach ($subscriptions as $sub) {
            $packageName = $sub->package ? $sub->package->name : 'Unknown Package';
            $expiryInfo[] = $packageName . ' - ' . \Carbon\Carbon::parse($sub->end_date)->format('d M, Y');
        }
    } else {
        $expiryInfo[] = 'No Subscription';
    }

    return view('student.dashboard', compact(
        'student',
        'purchases',
        'solutionsBought',
        'activeSubscription',
        'packagesCount',
        'expiryInfo'
    ));
}



    public function subscription()
    {
        $student = Auth::guard('student')->user();

        $subscriptions = $student->subscriptions()->with('package')->get();

        return view('student.student_subscription', compact('subscriptions'));
    }

    public function student_solutions()
    {
        $student = Auth::guard('student')->user();

        $purchases = Purchase::with(['student', 'solution', 'package'])
            ->where('student_id', $student->id)
            ->get();

        return view('student.student_solution', compact('purchases'));
    }

    public function student_refund_show(Request $request)
    {
        $student = Auth::guard('student')->user();

        $refundRequests = RefundRequest::where('student_id', $student->id)->get();

        return view('student.student_refund', compact('refundRequests'));
    }

    public function student_refund(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'transaction_id' => 'required|string',
            'amount' => 'required|numeric',
            'reason' => 'required|string',
            'card_last_four' => 'nullable|string|max:4',
        ]);

        RefundRequest::create([
            'student_id' => $request->student_id,
            'subscription_id' => auth('student')->user()->latestSubscription->id ?? null,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->amount,
            'reason' => $request->reason,
            'card_last_four' => $request->card_last_four,
        ]);

        return redirect()->route('student.refund.show')->with('success', 'Refund request submitted.');
    }

    public function student_solution_req(){
        $student = Auth::guard('student')->user();

        $solutions = CustomSolution::where('student_id', $student->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('student.student_custom_solution', compact('solutions'));
    }

    public function viewSolution($id)
    {
        $student = Auth::guard('student')->user();

        $solution = CustomSolution::where('student_id', $student->id)
            ->where('id', $id)
            ->firstOrFail();

        return view('student.solution_activity', compact('solution'));
    }

    public function paySolution($id)
    {
        return back()->with('success', 'Payment functionality coming soon.');
    }
}

