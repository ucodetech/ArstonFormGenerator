<?php

namespace App\Traits;

use KingFlamez\Rave\Facades\Rave as Flutterwave;

trait WithFlutterPayment
{

    public function makePayment($data){
           return $this->pay($data);
    }

    protected  function  pay($data){

        $payment = Flutterwave::initializePayment($data);
        if ($payment['status'] !== 'success') {
            // notify something went wrong
            return redirect()->route('user.customer.orders')->with('warning', 'Product payment confirmation unsuccessful. click on the pay button to retry!');
        }
        return redirect($payment['data']['link']);
    }


    public function callback(){
        $status = request()->status;

        //if payment is successful
        if ($status == 'completed') {
            $transactionID = Flutterwave::getTransactionIDFromCallback();
            return Flutterwave::verifyTransaction($transactionID);
        }
        elseif ($status ==  'cancelled'){
            //Put desired action/code after transaction has been cancelled here
          return 'cancelled';
        }
        else{
            //Put desired action/code after transaction has failed here
            return 'failed';
        }

    }

    public function verifyPayment($transactionReference){
       if(Flutterwave::verifyTransaction($transactionReference)):
           return 'success';
       else:
           return 'failed';
       endif;
    }

}
