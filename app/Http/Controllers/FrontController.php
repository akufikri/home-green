<?php

namespace App\Http\Controllers;

use App\Models\Stuff;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {   $front = Stuff::all();
        return view('front', compact('front'));
    }
}