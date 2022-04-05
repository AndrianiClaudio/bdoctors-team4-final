<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Subscription;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subs = Subscription::all();
        return view('doctors.subscriptions.index', compact('subs'));
    }
}
