<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

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
        $doctors = User::where('slug',$slug)->first();

        return response()->json([
            'response' => true,
            'doctors' => $doctors,
        ]);
    }
}
