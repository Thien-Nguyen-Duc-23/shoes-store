<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;

    protected $table = 'orders';
    protected $dates = ['deleted_at'];

    // order status
    const NewOrder = 1;
    const Processing = 2;
    const Hold = 3;
    const Canceled = 4;
    const Done = 5;
    const Failed = 99;

    //shipping status
    const NotSent = 1;
    const Sending = 2;
    const ShippingDone = 3;    

    protected $fillable = [
        'user_id',
        'amount',
        'date_order',
        'note',
        'order_status',
        'shipping_status',
        'payment_status',
        'shipping_method',
        'payment_method',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
}
