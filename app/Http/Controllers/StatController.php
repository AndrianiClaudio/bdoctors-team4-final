<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Review;

class StatController extends Controller
{
    public function index()
    {
        // dd('stat_index');

        $reviews = Review::where('user_id', Auth::id())->get();
        return view('doctors.stats.index', compact('reviews'));
    }
}
