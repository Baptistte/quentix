<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function create()
    {
        return view('sites.create');
    }

    public function index()
    {        
        return view('sites.index');
    }
}

