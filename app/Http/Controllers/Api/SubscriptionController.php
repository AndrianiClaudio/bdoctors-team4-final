<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function generate(Request $request, Gateway $gateway)
    {
        // GENERO TOKEN BRAINTREE
        $token = $gateway->clientToken()->generate();
        $data = [
            'success' => true,
            'token' => $token
        ];

        // RETURN STATUS 200
        return response()->json($data, 200);
    }
}
