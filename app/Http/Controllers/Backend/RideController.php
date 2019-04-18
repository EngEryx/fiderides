<?php

namespace App\Http\Controllers\Backend;

use App\Models\Owner\Ride;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class RideController extends Controller
{
    public function table(Request $request)
    {
        {
            try {
                return datatables()->of(Ride::query()->with('user')->get())
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
