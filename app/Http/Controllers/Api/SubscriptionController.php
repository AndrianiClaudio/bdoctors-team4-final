<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use Illuminate\Http\Request;
use App\Http\Requests\Orders\OrdersRequest;
use Braintree\Gateway;
=======
use Braintree\Gateway;
use Illuminate\Http\Request;
>>>>>>> 02d10fae48d91a38b37502a5215d981ba072b863

class SubscriptionController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
<<<<<<< HEAD
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => 'true',
            'token' => $token
        ];
        return response()->json($data, 200);
    }
    /* public function payment(OrdersRequest $request, Gateway $gateway)
    {
        $product = Product::find($request->product);
        $result = $gateway->transaction()->sale([
            'amount' => $product->price,
            'paymentMethodNonce' => $request->token,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {
            $data = [
                'success' => 'true',
                'message' => 'transazione eseguita con successo'
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => 'false',
                'message' => 'transazione non riuscita'
            ];
            return response()->json($data, 200);
        }
    } */
=======
        // GENERO TOKEN BRAINTREE
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        // RETURN STATUS 200
        return response()->json($data, 200);
    }
>>>>>>> 02d10fae48d91a38b37502a5215d981ba072b863
}
