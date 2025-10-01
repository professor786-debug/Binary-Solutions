<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSubscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = StudentSubscription::with('student', 'package')->get();
        return view('admin.Student_Subscription.student_subscription_list', compact('subscriptions'));
    }
    public function deactivateExpired()
    {
        $now = Carbon::now();

        // Update subscriptions where end_date < now
        $updatedCount = StudentSubscription::where('end_date', '<', $now)
            ->where('is_active', 1) // only update active ones
            ->update(['is_active' => 0]);

        return redirect()->back()->with('success', "$updatedCount subscription(s) marked as inactive.");
    }
}
