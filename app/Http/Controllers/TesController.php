<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesController extends Controller
{
    function tampil(){
        return view('dashboard');
    }
}
