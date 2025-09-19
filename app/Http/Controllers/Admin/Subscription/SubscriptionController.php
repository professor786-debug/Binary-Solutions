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
}
