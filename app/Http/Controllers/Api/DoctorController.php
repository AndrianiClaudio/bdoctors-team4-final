<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Message;

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
        // $doctors = User::where('slug', $slug)->first();
        $data = $request->all();

        $request->validate([
            'firstname' => 'required | max:60',
            'lastname' => 'required | max:60',
            'email' => 'required | max:255  | email'
        ]);
        // REDIRECT A HOME, NON A DOCTOR INFO, SE FALLISCE!!! DA CONTROLLARE (FORSE AUTOFIXATO)

        // $data['user_id'] = User::where('slug', $slug)->first()->id;

        $msg = new Message();
        $msg->fill($data);
        $msg->user_id = User::where('slug', $slug)->first()->id;
        $msg->save();

        return redirect("/");
    }
}
