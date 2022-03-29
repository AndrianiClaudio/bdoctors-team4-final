<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Service;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Model\Specialization;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('user_id', Auth::user()->id)->get();


        foreach ($services as $service) {
            $service['category_name'] = Specialization::where('id', $service->specialization_id)->first()->category;
        }

        $doctor = User::find(Auth::user()->id);
        return view('doctors.services.index', compact('services', 'doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        $doctor = User::find(Auth::user()->id);
        if (!$service) {
            return redirect()->route('services.index');
        }
        else if ($service->user_id !== Auth::user()->id) {
            return redirect()->route('services.index');
        }
        else {
            $service['category_name'] = Specialization::where('id', $service->specialization_id)->first()->category;
            return view('doctors.services.show', compact('service', 'doctor'));
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
