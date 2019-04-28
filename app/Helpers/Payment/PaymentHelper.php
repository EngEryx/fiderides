<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2/7/18
 * Time: 9:28 AM
 */

namespace App\Helpers\Payment;



use App\Models\Auth\User;
use App\Models\Passenger\Book;
use App\Models\Payment\PaymentConfirmation;
use Illuminate\Support\Facades\DB;

class PaymentHelper
{

    /**
     * PaymentHelper constructor.
     *
     */
    public function __construct()
    {

    }

    private static function formatPhoneNumber($msisdn)
    {
        if(starts_with($msisdn, '+254')){
            return $msisdn;
        }
        if(starts_with($msisdn, '254')){
            return $msisdn;
        }
        return "254".substr($msisdn,1);
    }

    public function process($input)
    {
        if($input['trans_amount'] == 0)
            return;
        if(!PaymentConfirmation::query()->where(['trans_id'=>$input['trans_id']])->exists())
            DB::transaction(function() use ($input){
            #payment confirmation
            $data = $input;
            //Remove the statement below.
            $data['kyc_name'] = ends_with($data['kyc_name'],'.New')?str_replace('.New','',$data['kyc_name']):$data['kyc_name'];
            $phone = self::formatPhoneNumber($input['msisdn']);
            $mpesa = PaymentConfirmation::query()->create($data);

             $user = User::where(['phone' => $phone]);

             if($user->exists()){
                 $user = $user->first();
                 $booking = Book::where(['user_id' => $user->id,'status'=>0])->orderBy('created_at');
                 if($booking->exists()){
                     $booking = $booking->first();
                     $booking->status = 1;
                     $booking->save();
                     $mpesa->status = 1;
                     $mpesa->save();
                 }
             }

        });
    }
}