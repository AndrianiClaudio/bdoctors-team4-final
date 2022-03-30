<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Model\Specialization;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Model\Service;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctor = User::where('slug', Auth::User()->slug)->first();
        //dd($doctors);
        return view('doctors.index', compact('doctor'));
    }


    //doctor page 
    /*     public function userIndex()
     {
     $doctors = User::where('id', Auth::User()->id)->first();
     //dd($doctors);
     return view('doctors.index', compact('doctors'));
     } */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("doctors.create");
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
    public function show($slug)
    {

        if (Auth::user()->slug != $slug) {
            abort('403');
        }
        else {
            $doctor = User::where('slug', $slug)->first();
            // OTTENGO SPEC DI DOCTOR
            $doctor->specs = $doctor->specializations()->get();
            // OTTENGO SPEC DI DOCTOR
            $doctor->services = Service::where('user_id', $doctor->id)->get();
            return $doctor ? view('doctors.show', compact('doctor')) : view('doctors.home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $doctor = User::where('slug', $slug)->first();
        $specializations = Specialization::all();
        return view("doctors.edit", ["doctor" => $doctor, "specializations" => $specializations]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // dd($request["specializations"]);

        if (empty($request['specializations'])) {
            $request['specializations'] = [];
        }

        // dd($request->all());

        $data = $request->validate([
            'firstname' => ['string', 'max:60'],
            'lastname' => ['string', 'max:60'],
            'email' => ['string', 'email', 'max:255'],
            'specializations' => ['required', 'exists:App\Model\Specialization,id'],
            'old-password' => ['nullable', 'min:8', new MatchOldPassword],
            'password' => ['nullable', 'min:8', 'confirmed'],
            'address' => ['string', 'max:255'],
        ]);
        $user = User::where('slug', $slug)->first();
        $data['password'] = Hash::make($request['password']);
        $user->update($data);

        // dd($request->all());

        $user->specializations()->sync($data['specializations']);

        // dd($user);
        return redirect()->route('profile.edit', $slug)->with('edit_response', 'Modifica al profilo avvenuta con successo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->specializations()->detach();
        $user->delete();
        return redirect()->route('home');
    }
}
