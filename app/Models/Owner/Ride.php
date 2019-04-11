<?php

namespace App\Models\Owner;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $guarded = [];

    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
