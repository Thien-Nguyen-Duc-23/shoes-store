<?php

namespace App\Http\Controllers\Client_V_2\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeClient extends Controller
{
    public function index()
    {
        return view('client_v_2.home.index');
    }
}
