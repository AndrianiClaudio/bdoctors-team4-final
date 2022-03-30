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
        $specs = Specialization::all();
        return view('doctors.services.create', compact('specs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $data = $request->all();

        $dataValidate = $request->validate([
            'type' => 'required',
            'description' => 'required',
            'specialization_id' => 'required',
        ]);

        $data['user_id'] = Auth::user()->id;

        $service = new Service();

        $service->fill($data);
        $service->specialization_id = (int)$data['specialization_id'];

        $service->save();
        return redirect()->route('services.show', $service->id);
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
        } else if ($service->user_id !== Auth::user()->id) {
            return redirect()->route('services.index');
        } else {
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
    public function edit(Service $service)
    {
        if (Auth::user()->id != $service->user_id) {
            return redirect()->route('services.edit', $service);
        }
        $specs = Specialization::all();
        return view('doctors.services.edit', compact('specs', 'service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->all();
        if (Auth::user()->id != $service->user_id) {
            return redirect()->route('services.edit', $service);
        }
        $postValidate = $request->validate([

            'type' => 'required',
            'description' => 'required',
            'specialization_id' => 'exists:App\Model\Specialization,id',
        ]);
        if (Auth::user()->id == $service->user_id) {
            $service->update($data);
            return redirect()->route('services.show', $service);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if (Auth::user()->id != $service->user_id) {
            abort('403');
        }
        $service->delete();
        return redirect()->route('services.index');
    }
}
