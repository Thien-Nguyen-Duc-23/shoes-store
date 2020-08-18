<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetails extends Model
{
    use SoftDeletes;

    protected $table = 'order_details';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'order_id',
        'shoes_id',
        'quantity',
        'price',
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id');
    }

    public function shoes()
    {
        return $this->belongsTo(Shoes::class, 'shoes_id');
    }
}
