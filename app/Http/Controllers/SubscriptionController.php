<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Subscription;
use phpDocumentor\Reflection\Types\String_;


class SubscriptionController extends Controller
{
    public function index()
    {
        $subs = Subscription::all();
        $selected = 0;
        return view('doctors.subscriptions.index', compact('subs', 'selected'));
    }
    public function confirm()
    {
        // $selected = Subscription::where('name', $selected)->first();
        $selected = $_GET['selected'];
        $subs = Subscription::all();
        return view('doctors.subscriptions.index', compact('subs', 'selected'));
    }
}
