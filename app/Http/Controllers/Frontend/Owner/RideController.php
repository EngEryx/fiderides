<?php

namespace App\Http\Controllers\Frontend\Owner;

use App\Models\Owner\Ride;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.ride.index')
            ->with('rides', Ride::query()->where(['user_id' => auth()->id()])->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.ride.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            '*' => 'required'
        ]);

        $ride = Ride::query()->create(array_merge(['user_id' => auth()->id()], $request->except('_token', 'destination')));
        $data = explode(',', $request->destination);
        if ($ride->kind == 1){
            foreach ($data as $key => $item) {
                if($key % 2 != 0) continue;
                $ride->destinations()->create(['destination' => $item, 'amount' => $data[$key+1], 'order' => $key++]);
            }
        } else {
            $ride->destinations()->create(['order' => 1, 'destination' => $data[0], 'amount' => $data[1]]);
        }

        return redirect()->route('frontend.ride.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Owner\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Owner\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
        $ride->destination = implode(array_flatten($ride->destinations()->get(['destination', 'amount'])->toArray()), ', ');
        session()->flash('_old_input', $ride);

        return view('frontend.ride.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Owner\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ride $ride)
    {
        $this->validate($request, [
            '*' => 'required'
        ]);

        $ride->update($request->except('_token', 'destination'));

        $ids = [];
        $data = explode(',', $request->destination);
        dd($data);
        if ($ride->kind == 1){
            foreach ($data as $key => $item){
                if($key % 2 != 0) continue;
                $destination = $ride->destinations()->updateOrCreate(['destination' => $item, 'amount' => $data[$key+1], 'order' => $key++]);
                $ids[] = $destination->id;
            }
        } else {
            $destination = $ride->destinations()->updateOrCreate(['order' => 1, 'destination' => $data[0], 'amount' => $data[1]]);
            $ids[] = $destination->id;
        }
        $ride->destinations()->whereNotIn('id', $ids)->delete();

        return redirect()->route('frontend.ride.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Owner\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
