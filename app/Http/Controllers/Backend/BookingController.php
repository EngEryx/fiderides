<?php

namespace App\Http\Controllers\Backend;

use App\Models\Passenger\Book;
use App\Models\Payment\PaymentConfirmation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function approve(Book $booking)
    {
        $mpesa = PaymentConfirmation::query()->where(['trans_amount' => $booking->amount, 'status' => 0, 'msisdn' => intPhoneNumber($booking->user->phone)]);
        $mpesa->status = 1;
        $mpesa->save();

        $booking->status = 1;
        $booking->save();

        return back()->withFlashSuccess('Booking has been approved. Driver awarded Kshs ' . number_format($booking->amount, 2));
    }
    
    public function table(Request $request)
    {
        try {
            return datatables()->of(Book::query()->with(['user', 'ride.user', 'destination'])->get())
                ->escapeColumns('actions')
                ->addColumn('actions',function($book){
                    return $book->action_buttons;
                })
                ->toJson();
        } catch (\Exception $e) {
            Log::error("Rides/Table".$e->getMessage());
        }
    }
}
