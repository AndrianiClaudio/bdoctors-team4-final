<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Review;

class ReviewController extends Controller
{
    public function random()
    {
        $rews = Review::where('vote', '>', 4)->whereNotNull('content')->inRandomOrder()->limit(4)->get();

        return response()->json([
            'success' => true,
            'rand_reviews' => $rews
        ]);
    }
}
