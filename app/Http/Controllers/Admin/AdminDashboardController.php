<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;   // ✅ Add this
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\CustomSolution;
use App\Models\StudentSubscription;
use App\Models\RefundRequest;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // ---- Date Ranges ----
        $startOfWeek   = Carbon::now()->startOfWeek();
        $endOfWeek     = Carbon::now()->endOfWeek();

        $startOfMonth  = Carbon::now()->startOfMonth();
        $endOfMonth    = Carbon::now()->endOfMonth();

        $startOfYear   = Carbon::now()->startOfYear();
        $endOfYear     = Carbon::now()->endOfYear();

        // ---- Calculations ----
        $weeklyRevenue  = $this->calculateRevenue($startOfWeek, $endOfWeek);
        $monthlyRevenue = $this->calculateRevenue($startOfMonth, $endOfMonth);
        $yearlyRevenue  = $this->calculateRevenue($startOfYear, $endOfYear);

        // ---- Extra Stats ----
        $customers = \DB::table('student_subscriptions')->count();
        $users     = \DB::table('students')->count();
        $purchases = \DB::table('purchases')->count()
            + \DB::table('custom_solutions')->count()
            + \DB::table('student_subscriptions')->count();
        $solutions       = \DB::table('solutions')->count();
        $customSolutions = \DB::table('custom_solutions')->count();
        $totalCustomers = \DB::table('student_subscriptions')->count();

        $totalIncome = \DB::table('purchases')->sum('grand_total')
            + \DB::table('custom_solutions')->sum('price')
            + \DB::table('student_subscriptions')->sum('amount');

        return view('admin.dashboard', compact(
            'weeklyRevenue',
            'monthlyRevenue',
            'yearlyRevenue',
            'customers',
            'users',
            'purchases',
            'solutions',
            'customSolutions',
            'totalCustomers',
            'totalIncome'
        ));
    }

    private function calculateRevenue($startDate, $endDate)
    {
        $purchaseTotal = Purchase::whereBetween('created_at', [$startDate, $endDate])->sum('grand_total');
        $customSolutionTotal = CustomSolution::whereBetween('created_at', [$startDate, $endDate])->sum('price');
        $subscriptionTotal = StudentSubscription::whereBetween('created_at', [$startDate, $endDate])->sum('amount');
        $refundTotal = RefundRequest::where('status', 'completed')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');

        return ($purchaseTotal + $customSolutionTotal + $subscriptionTotal) - $refundTotal;
    }
}
