<?php

namespace App\Models\Owner;

use App\Models\Auth\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $guarded = [];

    protected $appends = ['details', 'duration'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }

    public function getDetailsAttribute()
    {
        $details = $this->start;

        foreach ($this->destinations as $key => $item){
            $details .= ' - ' . $item->destination;
        }
        return $details;
    }

    public function getDurationAttribute()
    {
        $duration = Carbon::parse($this->start_time)->format('H:i') . ' - ' . Carbon::parse($this->end_time)->format('H:i');
        return $duration;
    }
}
