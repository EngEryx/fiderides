<?php

namespace App\Models\Passenger;

use App\Models\Auth\User;
use App\Models\Owner\Destination;
use App\Models\Owner\Ride;
use App\Models\Payment\PaymentConfirmation;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    protected $appends = ['details', 'amount', 'status_formatted'];

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

    public function getAmountAttribute()
    {
        $less = $this->has('start') && !is_null($this->start) ? $this->start->amount : 0;
        return $this->destination->amount - $less;
    }

    public function getStatusFormattedAttribute()
    {
        switch ($this->status){
            case 1:
                $status = 'Approved';
                break;
            default:
                $mpesa = PaymentConfirmation::query()->where(['trans_amount' => $this->amount, 'status' => 0, 'msisdn' => intPhoneNumber($this->user->phone)]);
                $status = ($mpesa->exists()) ? 'Pending approval' : 'Pending payment';
        }
        return $status;
    }

    public function getDetailsAttribute()
    {
        $details = !is_null($this->start) ? $this->start->destination : $this->ride->start;
        $details .= ' - ' . $this->destination->destination;

        return $details;
    }

    public function getApproveButtonAttribute()
    {
        $mpesa = PaymentConfirmation::query()->where(['trans_amount' => $this->amount, 'status' => 0, 'msisdn' => intPhoneNumber($this->user->phone)]);
        if ($mpesa->exists())
            return '<a href="'.route('admin.booking.approve', $this).'" class="btn btn-primary">Approve</a>';
        return '';
    }

    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group btn-group-xs">'.$this->approve_button.'</div>';
    }
}
