<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Specialization;
use Illuminate\Support\Facades\Auth;

class SpecializationController extends Controller
{   

    public function show($id)
    {
        $spec = Specialization::find($id);
        return view('doctors.specializations.show', compact('spec'));
    }

    public function destroy($id)
    {
        $spec = Specialization::find($id);
        Auth::user()->specializations()->detach($spec);
        return redirect()->route('profile.show', Auth::user()->slug);
    }
}
