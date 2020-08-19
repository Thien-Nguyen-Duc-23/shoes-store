<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomePage extends Controller
{
    public function homePage()
    {
        return view('client.home.index');
    }
}
