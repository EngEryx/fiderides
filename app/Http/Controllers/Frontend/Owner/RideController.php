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
        if ($ride->kind == 1){
            foreach (explode(',', $request->destination) as $key => $item) $ride->destinations()->create(['destination' => $item, 'order' => $key++]);
        } else {
            $ride->destinations()->create(array_merge(['order' => 1], $request->only('destination')));
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
        $ride->destination = implode($ride->destinations()->get()->pluck('destination')->toArray(), ', ');
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
        if ($ride->kind == 1){
            foreach (explode(',', $request->destination) as $key => $item){
                $destination = $ride->destinations()->updateOrCreate(['destination' => $item, 'order' => $key++]);
                $ids[] = $destination->id;
            }
        } else {
            $destination = $ride->destinations()->updateOrCreate(array_merge(['order' => 1], $request->only('destination')));
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

    public function table(Request $request)
    {
        {
            try {
                return datatables()->of(Ride::query()->get())
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
}
