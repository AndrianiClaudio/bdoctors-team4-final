<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Orders\OrdersRequest;
use Braintree\Gateway;

class SubscriptionController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
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
}
