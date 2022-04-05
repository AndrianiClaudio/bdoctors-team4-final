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
        $doctors = User::orderBy('id', 'asc')->where('id', '>', 0)->with('specializations', 'services', 'reviews', 'messages', 'subscriptions')->get();
        // $doctors;

        $filtered_doctors = [];
        $data['specialization'] = (str_replace('_', ' ', $data['specialization']));
        if (Specialization::where('category', $data['specialization'])->first()) {
            $id = Specialization::where('category', $data['specialization'])->first()->id;
            // dd($id);
            foreach ($doctors as $doctor) {
                $specs = $doctor->specializations()->get();
                foreach ($specs as $spec) {
                    if ($spec->id == $id) {
                        $filtered_doctors[] = $doctor;
                        break;
                    }
                }

                if (count($doctor->reviews) > 0) {
                    $sum = 0;
                    foreach ($doctor->reviews as $review) {
                        $sum += $review->vote;
                    }
                    $doctor->review_mean = $sum / count($doctor->reviews);
                }
            // dd(round($doctor->review_mean, 2));
            }

            // dd($doctors);

            return response()->json([
                'response' => true,
                'results' => [
                    'count' => count($filtered_doctors),
                    'doctors' => $filtered_doctors
                ]
            ]);
        }
        else {
            return response()->json([
                'response' => false,
                'results' => [
                    'doctors' => null,
                ]
            ]);

        }
    // dd($data);
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
