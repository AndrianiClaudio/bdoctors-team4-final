<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Specialization;

class SpecializationController extends Controller
{
    public function index()
    {
        $specs = Specialization::all();
        return response()->json([
            'response' => true,
            'count' => count($specs),
            'results' => compact('specs')
        ]);
    }
}
