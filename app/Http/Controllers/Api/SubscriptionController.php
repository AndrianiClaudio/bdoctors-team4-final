<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Orders\OrdersRequest;
use Braintree\Gateway;
use App\User;
use App\Model\Subscription;
use DateTime;
use DateInterval;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function priceName(Request $request)
    {
        $amount = Subscription::where('name', $request['name'])->first()->price;

        return response()->json([
            'success' => true,
            'amount' => $amount
        ]);
    }
    public function index()
    {
        $subscriptions = Subscription::all();
        return response()->json([
            'response' => true,
            'results' => compact('subscriptions')
        ]);
    }
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


    public function payment(Request $request, Gateway $gateway)
    {
        $data = $request->all();
        // request token fake-valid-nonce
        $data['amount'] = floatval($data['amount']);
        $data['user_id'] = intval($data['user_id']);
        $result = $gateway->transaction()->sale([
            'amount' => $data['amount'],
            'paymentMethodNonce' => $data['token'],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        $sub = Subscription::where('price', $data['amount'])->first();

        // FDURATION
        date_default_timezone_set('Europe/Rome');




        //     $user_sub = $user->subscriptions()->first();
        //     $expires = $user_sub->pivot->expires_date;

        $auth = User::find($data['user_id']);
        if ($result->success) {
            $user_sub = $auth->subscriptions()->first();

            $created = new Carbon($auth->subscriptions()->first()->pivot->expires_date);
            $now = Carbon::now();
            $difference = $now->diffForHumans($created);

            if ($user_sub && explode(' ', $difference)[2] === 'before') {

                $expires = $user_sub->pivot->expires_date;
                $now_clone = Carbon::parse($expires);

                // $now_clone->addMonths($sub->duration);
                $now_clone = $now_clone->addHours($sub->duration);
            }
            else {
                $now = new DateTime();
                $now_clone = clone $now;
                $now_clone->add(new DateInterval('PT' . $sub->duration . 'H'));
            }
            $sub_id = $sub->id;

            $auth->subscriptions()->detach();
            $auth->subscriptions()->attach($sub_id, [
                'expires_date' => $now_clone->format("y-m-d H:i"),
            ]);
            $data = [
                'success' => true,
                'message' => "Transazione eseguita."
            ];
            // return redirect()->route('subscriptions.index');
            return response()->json($data, 200);
        }
        else {
            // return redirect()->route('subscriptions.index');
            $data = [
                'success' => false,
                'message' => "Transazione fallita."
            ];
            return response()->json($data, 200);

        }
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
