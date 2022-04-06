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
        $doctors = User::where('id', '>', 0)->with('specializations', 'services', 'reviews', 'messages', 'subscriptions')->get();
        // $specs = Specialization::all();
        return response()->json([
            'response' => true,
            // 'results' => compact('doctors', 'specs')
            'results' => compact('doctors')
        ]);
    }

    public function filterSpec(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $doctors = User::orderBy('id', 'desc')->where('id', '>', 0)->with('specializations', 'services', 'reviews', 'messages', 'subscriptions')->get();
        // $doctors;

        $filtered_doctors = [];
        $data['specialization'] = (str_replace('_', ' ', $data['specialization']));


        // -----TEST----
        // return response()->json([
        //     'response' => true,
        //     'results' => [
        //         'count' => count($filtered_doctors),
        //         'doctors' => Specialization::where('category', $data['specialization'])->first()
        //     ]
        // ]);
        foreach ($doctors as $doctor) {
            $doctor_spec = [];

            foreach ($doctor->specializations()->get() as $doct_spec) {
                $doctor_spec[] = strtolower($doct_spec->category);
            }


            // dd($doctor_spec, $data['specialization']);

            if (in_array($data['specialization'], $doctor_spec)) {
                $filtered_doctors[] = $doctor;
            }

            if (count($doctor->reviews) > 0) {
                $sum = 0;
                foreach ($doctor->reviews as $review) {
                    $sum += $review->vote;
                }
                $doctor->review_mean = $sum / count($doctor->reviews);
            }
            else {
                $doctor->review_mean = 0;
            }
        }


        return response()->json([
            'response' => true,
            'results' => [
                'count' => count($filtered_doctors),
                'doctors' => $filtered_doctors
            ]]);
    }

    public function show($slug)
    {

        $doctors = User::where('slug', $slug)->with('specializations', 'services', 'reviews', 'messages')->first();

        return response()->json([
            'response' => true,
            // 'doctors' => $doctors,
            'results' => compact('doctors')
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

    // TEST SLIDER CLAUDIO
    public function SliderPaginate()
    {
        $doctors_paginate = User::where('id', '>', 0)->with('specializations', 'reviews', 'subscriptions', 'services')->paginate(3);

        // dd($doctors_paginate['data']);
        // $doctors = $doctors_paginate['data'];
        // dd($doctors);
        return response()->json([
            'response' => true,
            'results' => [
                'pagination' => $doctors_paginate,
            ]
        ]);
    }
}
