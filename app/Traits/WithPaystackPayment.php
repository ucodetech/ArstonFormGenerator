<?php

namespace App\Traits;

use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Facades\Paystack;



trait WithPaystackPayment
{
    // https://sandbox-api-d.squadco.com/transaction/initiate
    public function makePaystackPayment($data){
          return $this->payPayStack($data);
    }

    protected  function  payPayStack($data){
        try{
            return Paystack::getAuthorizationUrl($data)->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }     
    }



    public function callbackstack(){
        return Paystack::getPaymentData();
        

    }

    public function verifyPaymentstack($transactionReference){
       
    }

}
