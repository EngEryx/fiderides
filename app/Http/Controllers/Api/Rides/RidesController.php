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

    public function bookRide(Ride $ride, Request $request)
    {
        $data = ['ride_id' => $ride->id, 'user_id' => auth()->id()];
        if ($request->start_id != 0) $data['start_id'] = $request->start_id;

        Book::query()->create(array_merge($data, $request->only('destination_id')));

        return response()->json([
            'success' => true,
            'step' => 'pay',
        ]);
    }
}
