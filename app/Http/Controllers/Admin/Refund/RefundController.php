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
    /**
     * Show all refund requests.
     */
    public function index()
    {
        $refunds = RefundRequest::with('student')->latest()->get();
        return view('admin.refund.refund', compact('refunds'));
    }

    /**
     * Show refund action form for a specific request.
     */
    public function refundaction($id)
    {
        $refund = RefundRequest::findOrFail($id);
        return view('admin.refund.refundaction', compact('refund'));
    }

    /**
     * Handle refund actions (full, partial, reject) from the new unified form.
     */
    public function handleAction(Request $request, $id)
    {
        $refundRequest = RefundRequest::findOrFail($id);
        $action = $request->input('action_type');

        if ($action === 'full') {
            // ✅ Full refund
            Stripe::setApiKey(config('services.stripe.secret'));

            Refund::create([
                'charge' => $refundRequest->transaction_id,
            ]);

            $refundRequest->update([
                'status' => 'completed',
                'rejection_reason' => $request->full_reason,
            ]);

            StudentSubscription::where('stripe_charge_id', $refundRequest->transaction_id)->delete();

            return redirect()->route('admin_refund_requests')
                ->with('success', 'Full refund processed successfully and subscription removed.');
        }

        if ($action === 'partial') {
            // ✅ Validate partial amount instead of percentage
            $request->validate([
                'amount' => [
                    'required',
                    'numeric',
                    'min:0.01',
                    function ($attribute, $value, $fail) use ($refundRequest) {
                        if ($value > $refundRequest->amount) {
                            $fail("The refund amount cannot exceed the paid amount of {$refundRequest->amount}.");
                        }
                    },
                ],
                'reason' => 'nullable|string|max:255',
            ]);

            Stripe::setApiKey(config('services.stripe.secret'));

            // Stripe refund requires cents
            $amountToRefund = intval(round($request->amount * 100));

            Refund::create([
                'charge' => $refundRequest->transaction_id,
                'amount' => $amountToRefund,
            ]);

            $refundRequest->update([
                'status' => 'completed',
                'refund_amount' => $request->amount,
                'refund_reason' => $request->reason,
            ]);

            StudentSubscription::where('stripe_charge_id', $refundRequest->transaction_id)->delete();

            return redirect()->route('admin_refund_requests')
                ->with('success', "Refund of \${$request->amount} processed successfully.");
        }


        if ($action === 'reject') {
            // ✅ Reject refund
            $request->validate([
                'reject_reason' => 'required|string|max:500',
            ]);

            $refundRequest->update([
                'status' => 'rejected',
                'rejection_reason' => $request->reject_reason,
            ]);

            return redirect()->route('admin_refund_requests')
                ->with('success', 'Refund request rejected with reason.');
        }

        return redirect()->route('admin_refund_requests')
            ->with('error', 'Invalid action selected.');
    }

    /**
     * Old methods (kept for backward compatibility).
     */
    public function refundFull($id)
    {
        $refundRequest = RefundRequest::findOrFail($id);

        Stripe::setApiKey(config('services.stripe.secret'));

        Refund::create([
            'charge' => $refundRequest->transaction_id,
        ]);

        $refundRequest->update(['status' => 'completed']);

        StudentSubscription::where('stripe_charge_id', $refundRequest->transaction_id)->delete();

        return back()->with('success', 'Full refund processed successfully and subscription removed.');
    }

    public function getPaidAmount($id)
    {
        $refundRequest = RefundRequest::findOrFail($id);
        return response()->json(['amount' => $refundRequest->amount]);
    }

    // ✅ Partial Refund
    public function refundPartial(Request $request, $id)
    {
        $refundRequest = RefundRequest::findOrFail($id);

        // Validate money input
        $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) use ($refundRequest) {
                    if ($value > $refundRequest->amount) {
                        $fail("The refund amount cannot exceed the paid amount of {$refundRequest->amount}.");
                    }
                },
            ],
            'reason' => 'nullable|string|max:255',
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        // Stripe refund requires amount in cents (integer)
        $amountToRefund = intval(round($request->amount * 100));

        Refund::create([
            'charge' => $refundRequest->transaction_id,
            'amount' => $amountToRefund,
        ]);

        $refundRequest->update([
            'status' => 'completed',
            'refund_amount' => $request->amount,
            'refund_reason' => $request->reason,
        ]);

        StudentSubscription::where('stripe_charge_id', $refundRequest->transaction_id)->delete();

        return back()->with('success', "Refund of {$request->amount} processed successfully and subscription removed.");
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

        return back()->with('success', 'Refund request rejected with reasons.');
    }
}
