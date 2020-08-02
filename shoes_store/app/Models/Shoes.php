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
        return $this->belongsTo(OrderDetails::class, 'shoes_id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
