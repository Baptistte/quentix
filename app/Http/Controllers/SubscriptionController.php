<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display the subscription plans page.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('subscriptions.index');
    }
}