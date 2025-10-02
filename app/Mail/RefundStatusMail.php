<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\RefundRequest;

class RefundStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $refund;
    public $type;

    public function __construct(RefundRequest $refund, $type)
    {
        $this->refund = $refund;
        $this->type = $type;
    }

    public function build()
    {
        return $this->subject('Your Refund Request Status')
                    ->view('emails.refund-status');
    }
}
