<?php

namespace App\Http\Controllers\Frontend\Passenger;

use App\Models\Owner\Ride;
use App\Models\Passenger\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('frontend.book.index')
            ->with('rides', Ride::query()->get());
    }

    public function ride(Ride $ride)
    {
        return view('frontend.book.ride')
            ->with('ride', $ride);
    }

    public function trip(Request $request, Ride $ride)
    {
        Book::query()->create(array_merge(['ride_id' => $ride->id, 'user_id' => auth()->id()], $request->only('destination_id')));
        return redirect()->route(home_route())->withFlashSuccess('Your booking has been received. Proceed to make payment');
    }

    public function parcel(Request $request, Ride $ride)
    {
        Book::query()->create(array_merge(['kind' => 1, 'ride_id' => $ride->id, 'user_id' => auth()->id()], $request->only('weight')));
        return redirect()->route(home_route())->withFlashSuccess('Your booking has been received. Proceed to make payment');
    }
}
