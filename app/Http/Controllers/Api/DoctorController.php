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
        $doctors = User::paginate(5);
        $specializations = Specialization::all();
        $services = Service::all();
        $reviews = Review::all();
        return response()->json([
            'response' => true,
            'results' => ['doctors' => $doctors, 'specializations' => $specializations, 'services' => $services, 'reviews' => $reviews],
        ]);
    }




    public function provaIndex()
    {
        $doctors = User::all();
        $specializations = Specialization::all();
        $services = Service::all();
        $reviews = Review::all();
        foreach ($doctors as $doctor) {
            foreach ($specializations as $specialization) {
                if ($specialization['user_id'] == $doctor['id']) {
                }
            }
        }
        return response()->json([
            'response' => true,
            'results' => ['doctors' => $doctors, 'specializations' => $specializations, 'services' => $services, 'reviews' => $reviews],
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
