<?php

namespace App\Http\Controllers\Admin\Refund;

use App\Http\Controllers\Controller;
use App\Models\RefundRequest;
class RefundController extends Controller
{

   public function index()
    {

        $refunds = RefundRequest::with('student')->latest()->get();

        return view('admin.refund.refund', compact('refunds'));
    }

}

