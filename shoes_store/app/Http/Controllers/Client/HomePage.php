<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shoes;
use App\Models\Categories;
use Carbon\Carbon;

class HomePage extends Controller
{
    public function homePage()
    {
        $shoesSales = Shoes::with('shoesImages', 'shoesColors', 'shoesSizes', 'categories')
            ->where('status', Shoes::ACTIVE)
            ->where('is_sale', Shoes::IS_SALE)
            ->whereDate('start_date_sale', '<=', Carbon::now()->format('y-m-d'))
            ->whereDate('end_date_sale', '>', Carbon::now()->format('y-m-d'))
            ->orderBy('created_at', 'desc')
            ->get();
        
        $shoesOfCategories = Categories::with(['shoes' => function($query) {
            $query->where('status', Shoes::ACTIVE)
                ->orderBy('created_at', 'desc');
        }])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('client.home.index', compact('shoesOfCategories', 'shoesSales'));
    }
}
