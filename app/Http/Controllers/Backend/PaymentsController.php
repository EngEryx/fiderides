<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment\PaymentConfirmation;

class PaymentsController extends Controller
{
    public function table()
    {
        return datatables()->of(PaymentConfirmation::all())
            ->toJson(true);
    }
}
