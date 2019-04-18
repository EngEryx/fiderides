<?php

namespace App\Http\Controllers\Backend;

use App\Models\Passenger\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function table(Request $request)
    {
        try {
            return datatables()->of(Book::query()->with(['user', 'ride.user', 'destination'])->get())
                ->escapeColumns('actions')
                ->addColumn('actions',function($ride){
                    return $ride->action_buttons;
                })
                ->toJson();
        } catch (\Exception $e) {
            Log::error("Rides/Table".$e->getMessage());
        }
    }
}
