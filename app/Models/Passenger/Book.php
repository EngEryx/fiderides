<?php

namespace App\Models\Passenger;

use App\Models\Auth\User;
use App\Models\Owner\Destination;
use App\Models\Owner\Ride;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    protected $appends = ['details'];

    public function start()
    {
        return $this->belongsTo(Destination::class, 'start_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }

    public function getDetailsAttribute()
    {
        $details = !is_null($this->start) ? $this->start->destination : $this->ride->start;
        $details .= ' - ' . $this->destination->destination;

        return $details;

    }
}
