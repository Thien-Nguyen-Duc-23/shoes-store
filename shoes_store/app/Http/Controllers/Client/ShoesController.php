<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shoes;
use App\Models\OrderDetails;

class ShoesController extends Controller
{
    public function index(Request $request)
    {
        $shoesDetail = Shoes::with('shoesImages', 'colors', 'sizes', 'categories')
            ->where('slug', $request->slug)
            ->first();

        if (empty($shoesDetail)) {
            return redirect()->back();
        }

        $shoesColors = !$shoesDetail->colors->isEmpty() ? $shoesDetail->colors->pluck('name', 'id')->toArray() : [];
        $shoesSizes = !$shoesDetail->sizes->isEmpty() ? $shoesDetail->sizes->pluck('name', 'id')->toArray() : [];
        $shoesImages = !$shoesDetail->shoesImages->isEmpty() ? $shoesDetail->shoesImages->pluck('image')->toArray() : [];

        // get array Category
        $arrayCate = array($shoesDetail->categories->id);
        if (!$shoesDetail->categories->children->isEmpty()) {
            $arrayCate = array_merge($arrayCate,$shoesDetail->categories->children->pluck('id')->toArray());
        }

        // get relation shoes
        $relationShoes = Shoes::whereIn('category_id', $arrayCate)
            ->where('status', Shoes::ACTIVE)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        // get top buy
        $getIDShoes = OrderDetails::select('shoes_id', \DB::raw('count(*) as total'))
            ->groupBy('shoes_id')
            ->orderBy('total', 'desc')
            ->limit(7)
            ->get()
            ->pluck('shoes_id')
            ->toArray();
        $rateShoes = Shoes::whereIn('id', $getIDShoes)
            ->where('status', Shoes::ACTIVE)
            ->get();

        return view('client.shoes.index', compact('shoesDetail', 'shoesColors', 'shoesSizes', 'relationShoes', 'rateShoes', 'shoesImages'));
    }
}
