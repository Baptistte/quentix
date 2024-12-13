<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function display_main()
    {
        return view('usermain');
    }

    public function index()
    {        
        return view('sites.index');
    }
}

