<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatContorller extends Controller  
{
    function riwayat(){
        $user = Auth::user()->id;
        $task = Riwayat::where('user_id', $user)->get();
        return view('tasks.riwayat', compact('task'));
    }
}
