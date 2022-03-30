<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Message;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::all();
        return response()->json([
            'response' => true,
            'doctors' => $doctors
        ]);
    }
    public function show($slug)
    {
        $doctors = User::where('slug', $slug)->first();

        return response()->json([
            'response' => true,
            'doctors' => $doctors,
        ]);
    }
    public function newMessage(Request $request, $slug)
    {
        $data = $request->all();


        $validator = Validator::make($request->all(), [
            'firstname' => 'required | max:60',
            'lastname' => 'required | max:60',
            'email' => 'required | max:255  | email',
            'content' => 'required'
        ]);
        dd($validator->fails());

        $msg = new Message();
        $msg->fill($data);
        $msg->user_id = User::where('slug', $slug)->first()->id;
        $msg->save();

        return redirect("/");
    }
}
