<?php

namespace App\Models\Owner;

use App\Models\Auth\User;
use App\Models\Passenger\Book;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $guarded = [];

    protected $appends = ['details', 'duration','remaining_seats','has_booked','has_paid'];

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

    public function getHasBookedAttribute()
    {
        return Book::query()->where(['ride_id' => $this->id,'user_id' => auth()->id(),'status' => 1])->exists();
    }

    public function getRemainingSeatsAttribute()
    {
        return (int)$this->passengers - Book::query()->where(['ride_id' => $this->id,'status' => 1])->count();
    }

    public function getHasPaidAttribute()
    {
        return Book::query()->where(['ride_id' => $this->id,'user_id' => auth()->id(),'status' => 1])->exists();
    }

    public function getDurationAttribute()
    {
        $duration = Carbon::parse($this->start_time)->format('H:i A') . ' - ' . Carbon::parse($this->end_time)->format('H:i A');
        return $duration;
    }
}
