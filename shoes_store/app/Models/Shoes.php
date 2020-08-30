<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shoes extends Model
{
    use SoftDeletes;

    protected $table = 'shoes';
    protected $dates = ['deleted_at'];

    const DIRECTORY = 'shoes';
    const ACTIVE = 1;
    const DEACTIVATE = 0;
    const IS_SALE = 1;

    protected $fillable = [
        'category_id',
        'slug',
        'name',
        'price_cost',
        'price',
        'price_sale',
        'image',
        'sort_description',
        'long_description',
        'status',
        'is_sale',
        'start_date_sale',
        'end_date_sale',
        'sku',
        'created_at',
        'updated_at',
    ];

    // formart price to VND
    public function formartToVND($priceFloat)
    {
        $symbol = '₫';
        $symbol_thousand = '.';
        $decimal_place = 0;
        $price = number_format($priceFloat, $decimal_place, '', $symbol_thousand);

        return $price.$symbol;
    }

    public function shoesImages()
    {
        return $this->hasMany(ShoesImages::class, 'shoes_id');
    }

    public function shoesColors()
    {
        return $this->hasMany(ShoesColors::class, 'shoes_id');
    }

    public function shoesSizes()
    {
        return $this->hasMany(ShoesSizes::class, 'shoes_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'shoes_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Colors::class, 'shoes_colors', 'shoes_id', 'color_id');
    }

    public function sizes()
    {
        return $this->belongsToMany(Sizes::class, 'shoes_sizes', 'shoes_id', 'size_id');
    }
}
