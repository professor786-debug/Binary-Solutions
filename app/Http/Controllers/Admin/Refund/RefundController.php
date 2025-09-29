<?php

namespace App\Http\Controllers\Admin\Refund;

use App\Http\Controllers\Controller;
use App\Models\RefundRequest;
use App\Models\StudentSubscription;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Refund;

class RefundController extends Controller
{
    public function index()
    {
        $refunds = RefundRequest::with('student')->latest()->get();
        return view('admin.refund.refund', compact('refunds'));
    }

    // ✅ Full refund
   public function refundFull($id)
{
    $refundRequest = RefundRequest::findOrFail($id);

    Stripe::setApiKey(config('services.stripe.secret'));

    Refund::create([
        'charge' => $refundRequest->transaction_id, // charge id
    ]);

    // update refund request
    $refundRequest->update(['status' => 'completed']);

    // ✅ delete student subscription
    StudentSubscription::where('stripe_charge_id', $refundRequest->transaction_id)->delete();

    return back()->with('success', 'Full refund processed successfully and subscription removed.');
}

// ✅ Partial refund
public function refundPartial(Request $request, $id)
{
    $request->validate([
        'percentage' => 'required|integer|min:1|max:100',
    ]);

    $refundRequest = RefundRequest::findOrFail($id);

    Stripe::setApiKey(config('services.stripe.secret'));

    $amountToRefund = intval(($refundRequest->amount * $request->percentage) / 100 * 100);

    Refund::create([
        'charge' => $refundRequest->transaction_id,
        'amount' => $amountToRefund,
    ]);

    $refundRequest->update(['status' => 'completed']);

    // ✅ delete student subscription after partial refund too
    StudentSubscription::where('stripe_charge_id', $refundRequest->transaction_id)->delete();

    return back()->with('success', "Refund of {$request->percentage}% processed successfully and subscription removed.");
}
    public function reject(Request $request, $id)
{
    $request->validate([
        'rejection_reason' => 'required|string|max:500',
    ]);

    $refundRequest = RefundRequest::findOrFail($id);

    $refundRequest->update([
        'status' => 'rejected',
        'rejection_reason' => $request->rejection_reason,
    ]);

    return back()->with('success', 'Refund request rejected with reason.');
}

}
