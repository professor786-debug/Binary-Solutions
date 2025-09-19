<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Custom\CustomSolutionController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\Solution\SolutionController;
use App\Http\Controllers\Admin\Course\CourseController;
use App\Http\Controllers\Admin\Universty\UniverstyController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Package\PackageController;
use App\Http\Controllers\Student\StudentAuthController;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Admin\Subscription\SubscriptionController;
use App\Mail\VerifyStudentMail;
use App\Http\Controllers\Student\GoogleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//admin routes
Route::prefix('/panel/admin')->group(function () {
Route::get('/', [AuthController::class, 'index'])->name('admin_login_form');

Route::post('/login', [AuthController::class, 'login'])->name('admin_login');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('admin_dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('admin_logout');
});
Route::prefix('panel/admin/solutions')->group(function () {
    Route::get('/create', [SolutionController::class, 'create'])->name('solutions.create');
    Route::post('/store', [SolutionController::class, 'store'])->name('solutions.store');
    Route::get('/list', [SolutionController::class, 'index'])->name('solutions.index');
    Route::get('/solutions/{id}/edit', [SolutionController::class, 'edit'])->name('solutions.edit');
    Route::put('/solutions/{id}', [SolutionController::class, 'update'])->name('solutions.update');
    Route::delete('/solutions/{id}', [SolutionController::class, 'destroy'])->name('solutions.destroy');
});

Route::prefix('panel/admin/custom_solution')->group(function () {
    Route::get('/list/review', [SolutionController::class, 'custom_solution_list_review'])->name('admin.custom_solution_list_review');
    Route::get('/list/payments', [SolutionController::class, 'custom_solution_list_payment'])->name('admin.custom_solution_list_payment');
    Route::get('/list/solutions', [SolutionController::class, 'custom_solution_list_solutions'])->name('admin.custom_solution_list_solutions');
    Route::post('/admin/custom-solutions/{id}/step', [SolutionController::class, 'updateStep'])->name('admin.custom-solutions.update-step');
    Route::post('/admin/custom-solutions/{id}/solution-upload', [SolutionController::class, 'uploadSolution'])->name('admin.custom-solutions.upload-solution');
    Route::post('/custom-solutions/{id}/set-price', [SolutionController::class, 'setPrice'])->name('admin.custom-solutions.set-price');
    Route::post('/admin/custom-solutions/{id}/upload-solution', [SolutionController::class, 'uploadSolution'])->name('admin.custom-solutions.upload-solution');
});

Route::prefix('panel/admin/universty')->group(function () {
    Route::get('/create', [UniverstyController::class, 'create'])->name('universty.create');
    Route::post('/universities/store', [UniverstyController::class, 'store'])->name('universities.store');
    Route::get('/list', [UniverstyController::class, 'index'])->name('universty.index');
    Route::get('/universities/{id}/edit', [UniverstyController::class, 'edit'])->name('universities.edit');
    Route::put('/universities/{id}', [UniverstyController::class, 'update'])->name('universities.update');
    Route::delete('/universities/{id}', [UniverstyController::class, 'destroy'])->name('universities.destroy');
});

Route::prefix('panel/admin/student')->group(function () {
    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student.store');
    Route::get('/list', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
});

Route::prefix('panel/admin/package')->group(function () {
    Route::get('/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/list', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/{id}/edit', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/package/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::delete('/package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');
});

Route::prefix('panel/admin/student_subscription')->group(function () {
    Route::get('/list', [SubscriptionController::class, 'index'])->name('student_subscription.index');
});

Route::get('/', [MainController::class, 'index'])->name('main');
Route::get('/blogs', [MainController::class, 'blog'])->name('blogs');
Route::get('/contact_Us', [MainController::class, 'contact_us'])->name('contact_us');
Route::get('/services_detail', [MainController::class, 'category_detail'])->name('category_detail');
Route::get('/chat', [MainController::class, 'chat'])->name('chat');
Route::get('/login', [MainController::class, 'login'])->name('login');
Route::get('/register', [MainController::class, 'register'])->name('register');
Route::post('/student/register', [MainController::class, 'student_register'])->name('student.register');

// Route::middleware(['student.url'])->group(function () {
//     Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
//     Route::get('/package-checkout', [MainController::class, 'package_checkout'])->name('package_checkout');
// });

Route::get('/check-login', [MainController::class, 'checkLogin'])->name('check.login');
Route::post('/student-login', [MainController::class, 'student_login'])->name('student.login');
Route::get('/packages', [MainController::class, 'packages'])->name('packages');
Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/solution-review', [MainController::class, 'show'])->name('solution.detail');
Route::get('/logout', [MainController::class, 'student_logout'])->name('student.logout');
Route::get('/package-checkout', [MainController::class, 'package_checkout'])->name('package_checkout');
Route::post('/subscribe-newsletter', [MainController::class, 'subscribe'])->name('newsletter.subscribe');
Route::post('/checkout/stripe', [MainController::class, 'handleStripePayment'])->name('stripe.checkout');
Route::post('/checkout/solution/stripe', [MainController::class, 'handleSolutionStripe'])->name('checkout.solution.stripe');
Route::get('/login_confirmation', [MainController::class, 'login_confirmation'])->name('login_confirmation');
Route::get('/public/custom_solution', [MainController::class, 'custom_solution'])->name('custom_Solution');

Route::post('/custom-solutions/store', [CustomSolutionController::class, 'store'])->name('custom-solutions.store');



Route::get('/student/dashboard', [StudentAuthController::class, 'index'])->name('student.dashboard');
Route::get('/student/subscription', [StudentAuthController::class, 'subscription'])->name('student.subscription');
Route::get('/student/solutions', [StudentAuthController::class, 'student_solutions'])->name('student.solutions');
Route::get('/student/refund', [StudentAuthController::class, 'student_refund_show'])->name('student.refund.show');
Route::post('/student/refund/create', [StudentAuthController::class, 'student_refund'])->name('refund-requests.store');
Route::get('/student/custom/solution', [StudentAuthController::class, 'student_solution_req'])->name('student.customsolutions');
Route::get('/student/custom/solution/{id}', [StudentAuthController::class, 'viewSolution'])
    ->name('student.solution.view');
    Route::post('/student/solution/{id}/pay', [StudentAuthController::class, 'paySolution'])
    ->name('student.solution.pay');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

Route::get('/verify-student/{token}', [MainController::class, 'verifyStudent']);

Route::get('/test-email', function () {
    $token = 'dummy-token-123';
    Mail::to('your@email.com')->send(new VerifyStudentMail($token));
    return 'Email sent!';
});
