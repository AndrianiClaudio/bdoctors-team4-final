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

    public function filterSpecNotPremium(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $doctors = User::orderBy('id', 'desc')->doesntHave('subscriptions')->where('id', '>', 0)->with('specializations', 'services', 'reviews', 'messages', 'subscriptions')->get();


        if (strtolower($data['specialization']) !== "all") {
            $filtered_doctors = [];

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
                    $doctor->review_mean = round($sum / count($doctor->reviews), 2);
                }
                else {
                    $doctor->review_mean = null;
                }
            }
            return response()->json([
                'response' => true,
                'results' => [
                    'count' => count($filtered_doctors),
                    'doctors' => $filtered_doctors
                ]]);
        }
        else {
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
                    $doctor->review_mean = round($sum / count($doctor->reviews), 2);
                }
                else {
                    $doctor->review_mean = null;
                }
            }
            return response()->json([
                'response' => true,
                'results' => [
                    'count' => count($doctors),
                    'doctors' => $doctors
                ]]);
        }


    }
    public function filterSpec(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $doctors = User::orderBy('id', 'desc')->whereHas('subscriptions')->where('id', '>', 0)->with('specializations', 'services', 'reviews', 'messages', 'subscriptions')->get();


        if (strtolower($data['specialization']) !== "all") {
            $filtered_doctors = [];

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
                    $doctor->review_mean = round($sum / count($doctor->reviews), 2);
                }
                else {
                    $doctor->review_mean = null;
                }
            }
            return response()->json([
                'response' => true,
                'results' => [
                    'count' => count($filtered_doctors),
                    'doctors' => $filtered_doctors
                ]]);
        }
        else {
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
                    $doctor->review_mean = round($sum / count($doctor->reviews), 2);
                }
                else {
                    $doctor->review_mean = null;
                }
            }
            return response()->json([
                'response' => true,
                'results' => [
                    'count' => count($doctors),
                    'doctors' => $doctors
                ]]);
        }


    }

    public function show($slug)
    {

        $doctors = User::where('slug', $slug)->with('specializations', 'services', 'reviews', 'messages')->first();

        if (count($doctors->reviews) > 0) {
            $sum = 0;
            foreach ($doctors->reviews as $review) {
                $sum += $review->vote;
            }
            ;
            $doctors->review_mean = round($sum / count($doctors->reviews), 2);
        }


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

        return redirect("/doctor/" . $slug);
    }
    public function newReview(Request $request, $slug)
    {
        $data = $request->all();

        $request->validate([
            'vote' => 'required | min:1 | max:5',
            'username' => 'nullable | max:60',
            'content' => 'nullable',
        ]);

        $msg = new Review();
        $msg->fill($data);

        $msg->user_id = User::where('slug', $slug)->first()->id;

        $msg->save();

        return redirect("/doctor/" . $slug . "/reviews");
    }

    // TEST SLIDER CLAUDIO
    public function SliderPaginate()
    {
        $doctors_paginate = User::where('id', '>', 0)->whereHas('subscriptions')->with('specializations', 'reviews', 'subscriptions', 'services')->paginate(3);

        return response()->json([
            'response' => true,
            'results' => [
                'pagination' => $doctors_paginate,
            ]
        ]);
    }
}
