<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Specialization;

class SpecializationController extends Controller
{
    public function index()
    {
        $specs = Specialization::all();
        return response()->json([
            'response' => true,
            'results' => compact('specs')
        ]);
    }
}
