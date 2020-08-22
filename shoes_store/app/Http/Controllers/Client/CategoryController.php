<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function productCategory(Request $request)
    {

        return view('client.category.index');
    }
}
