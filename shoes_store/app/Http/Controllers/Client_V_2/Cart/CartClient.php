<?php

namespace App\Http\Controllers\Client_V_2\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartClient extends Controller
{
    public function index (Request $request)
    {
        // $data = $request->session()->all();
        // dd($request->session()->get('user'));
        return view('client_v_2.cart.index');
    }
}
