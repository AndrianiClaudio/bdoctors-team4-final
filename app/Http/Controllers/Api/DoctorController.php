<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use App\Model\Message;
use App\Model\Review;
use App\Model\Service;
use App\Model\Specialization;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = User::where('id', '>', 0)->with('specializations', 'services', 'reviews', 'messages')->get();
        // $specs = Specialization::all();
        return response()->json([
            'response' => true,
            // 'results' => compact('doctors', 'specs')
            'results' => compact('doctors')
        ]);
    }

    public function show($slug)
    {
        $doctors = User::where('slug', $slug)->with('specializations', 'services', 'reviews', 'messages')->first();

        return response()->json([
            'response' => true,
            'doctors' => $doctors,
        ]);
    }
    public function newMessage(Request $request, $slug)
    {
        $data = $request->all();

        $request->validate([
            'firstname' => 'required | max:60',
            'lastname' => 'required | max:60',
            'email' => 'required | max:255  | email',
            'content' => 'required',
        ]);

        $msg = new Message();
        $msg->fill($data);

        $msg->user_id = User::where('slug', $slug)->first()->id;

        $msg->save();

        return redirect("/");
    }
    public function newReview(Request $request, $slug)
    {
        $data = $request->all();

        $request->validate([
            'vote' => 'required | min:1 | max:5',
            'username' => 'required | max:60',
            'content' => 'required',
        ]);

        $msg = new Review();
        $msg->fill($data);

        $msg->user_id = User::where('slug', $slug)->first()->id;

        $msg->save();

        return redirect("/");
    }
}
