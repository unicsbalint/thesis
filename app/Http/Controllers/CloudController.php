<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CloudController extends Controller
{
    public function index()
    {
        return view('cloud');
    }
}
