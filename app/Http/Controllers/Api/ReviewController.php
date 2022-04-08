<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Review;

class ReviewController extends Controller
{
    public function MonthYear(Request $request)
    {
        $auth_reviews = Review::orderBy('created_at')->where('user_id', $request['user_id'])->get();
        // dd($auth_reviews);
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;
        $num5 = 0;
        $num6 = 0;
        $num7 = 0;
        $num8 = 0;
        $num9 = 0;
        $num10 = 0;
        $num11 = 0;
        $num12 = 0;
        // dd(count($auth_reviews));
        foreach ($auth_reviews as $rev) {
            $month = $rev->created_at->format('m');
            // dd($month);
            switch ($month) {
                case "01":
                    $num1 += 1;
                    # code...
                    break;
                case "02":
                    $num2 += 1;
                    # code...
                    break;
                case "03":
                    $num3 += 1;
                    # code...
                    break;
                case "04":
                    $num4 += 1;
                    # code...
                    break;
                case "05":
                    $num5 += 1;
                    # code...
                    break;
                case "06":
                    $num6 += 1;
                    # code...
                    break;

                case "07":
                    $num7 += 1;
                    # code...
                    break;
                case "08":
                    $num8 += 1;
                    # code...
                    break;
                case "09":
                    $num9 += 1;
                    # code...
                    break;
                case "10":
                    $num10 += 1;
                    # code...
                    break;
                case "11":
                    $num11 += 1;
                    # code...
                    break;
                case "12":
                    $num12 += 1;
                    # code...
                    break;

                default:
                    break;
            }
        }

        return response()->json([
            'success' => true,
            'count' => count($auth_reviews),
            'reviewCountMonth' => [
                $num1,
                $num2,
                $num3,
                $num4,
                $num5,
                $num6,
                $num7,
                $num8,
                $num9,
                $num10,
                $num11,
                $num12,
            ],
        ]);
    }

    public function VoteMonthYear(Request $request)
    {
        $auth_reviews = Review::orderBy('created_at')->where([['user_id', '=', $request['user_id']], ['vote', '=', $request['vote']]])->get();
        // dd($auth_reviews);
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $num4 = 0;
        $num5 = 0;
        $num6 = 0;
        $num7 = 0;
        $num8 = 0;
        $num9 = 0;
        $num10 = 0;
        $num11 = 0;
        $num12 = 0;

        foreach ($auth_reviews as $rev) {
            $month = $rev->created_at->format('m');
            // dd($month);
            switch ($month) {
                case "01":
                    $num1 += 1;
                    # code...
                    break;
                case "02":
                    $num2 += 1;
                    # code...
                    break;
                case "03":
                    $num3 += 1;
                    # code...
                    break;
                case "04":
                    $num4 += 1;
                    # code...
                    break;
                case "05":
                    $num5 += 1;
                    # code...
                    break;
                case "06":
                    $num6 += 1;
                    # code...
                    break;

                case "07":
                    $num7 += 1;
                    # code...
                    break;
                case "08":
                    $num8 += 1;
                    # code...
                    break;
                case "09":
                    $num9 += 1;
                    # code...
                    break;
                case "10":
                    $num10 += 1;
                    # code...
                    break;
                case "11":
                    $num11 += 1;
                    # code...
                    break;
                case "12":
                    $num12 += 1;
                    # code...
                    break;

                default:
                    break;
            }
        }


        return response()->json([
            'success' => true,
            'count' => count($auth_reviews),
            'reviewCountMonth' => [
                $num1,
                $num2,
                $num3,
                $num4,
                $num5,
                $num6,
                $num7,
                $num8,
                $num9,
                $num10,
                $num11,
                $num12,
            ],
        ]);
    }
    public function random()
    {
        $rews = Review::where('vote', '>', 4)->whereNotNull('content')->inRandomOrder()->limit(4)->get();

        return response()->json([
            'success' => true,

            'rand_reviews' => $rews
        ]);
    }
}
