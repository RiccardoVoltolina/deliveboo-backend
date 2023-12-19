<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function generate(Request $request) {



        $token = $this->gateway->clientToken()->generate();

        $data = [
            'token' => $token
        ];
        
        
        return response()->json($data, 200);
        // return 'generate';
    }

    public function makePayment(Request $request) {
        return 'makePayment';
    }

}
