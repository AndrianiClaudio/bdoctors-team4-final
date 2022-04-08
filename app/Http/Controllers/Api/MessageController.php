<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Message;

class MessageController extends Controller
{
    public function MonthYear(Request $request)
    {
        $auth_messages = Message::orderBy('created_at')->where('user_id', $request['user_id'])->get();
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
        foreach ($auth_messages as $msg) {
            $month = $msg->created_at->format('m');
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
            'messageCountMonth' => [
                1 => $num1,
                2 => $num2,
                3 => $num3,
                4 => $num4,
                5 => $num5,
                6 => $num6,
                7 => $num7,
                8 => $num8,
                9 => $num9,
                10 => $num10,
                11 => $num11,
                12 => $num12,
            ],
        ]);
    }

}
