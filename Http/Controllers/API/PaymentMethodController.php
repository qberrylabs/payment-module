<?php

namespace Modules\PaymentMethodeModule\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Modules\PaymentMethodeModule\Entities\PaymentMethod;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    public function PaymentMethodByCountry($country)
    {
        return PaymentMethod::where('country',$country)->get();
    }

    public function getPaymentMethodByCountry($country =null)
    {
        if ($country == null) {
            return response()->json(['success' => 'false','message' => "There Are No Country"], 400);
        }
        $paymentMethods=$this->PaymentMethodByCountry($country);
        return response()->json(['paymentMethods' => $paymentMethods], 200);
    }

    public function getUserPaymentMethod()
    {
        $userCountry=Auth::user()->country;
        if($userCountry == null){
            return response()->json(['success' => 'false','message' => "There Are No Country"], 400);
        }

        $paymentMethods=$this->PaymentMethodByCountry($userCountry);
        return response()->json(['paymentMethods' => $paymentMethods], 200);
    }
}
