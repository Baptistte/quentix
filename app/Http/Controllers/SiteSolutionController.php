<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteSolutionController extends Controller
{
    /**
     * Show the WordPress presentation page.
     *
     * @return \Illuminate\View\View
     */
    public function wordpress()
    {
        return view('solutions.wordpress'); // Ensure this view exists
    }
}