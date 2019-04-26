<?php

namespace App\Http\Controllers\Api\Rides;

use App\Models\Owner\Destination;
use App\Models\Owner\Ride;
use App\Models\Passenger\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RidesController extends Controller
{
    public function getRides()
    {
        return response()->json(Ride::query()->with('user','destinations')->get());
    }

    public function bookRide(Request $request)
    {
        $ride  =  Ride::find($request->ride_id);

        if($ride->has_booked || $ride->remaining_seats == 0){
            return response()->json([
                'success' => false,
                'message' => "You have already booked for this Ride or there are no seats available.",
                'ride' => $ride
            ]);
        }

        $data = ['ride_id' => $ride->id, 'user_id' => auth()->id()];

        if ($request->start_id != 0) $data['start_id'] = $request->start_id;

        Book::query()->create(array_merge($data, $request->only('destination_id')));

        return response()->json([
            'success' => true,
            'message' => 'Proceed to payment now',
            'ride' => $ride
        ]);
    }

    public function confirmRide(Request $request)
    {
        $ride  =  Ride::find($request->ride_id);
        $message = "";
        $status = false;
        if($ride->has_booked && $ride->has_paid){
            $message = "Great. You have paid for your ride.";
            $status = true;
        }else{
            $message = "Your payment for this ride has not been received yet. Please pay.";
        }

        return response()->json([
            'success' => $status,
            'message' => $message,
            'ride' => $ride
        ]);
    }
}
