<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoesSizes extends Model
{
    use SoftDeletes;

    protected $table = 'shoes_sizes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shoes_id',
        'size_id',
        'created_at',
        'updated_at',
    ];

    public function shoes()
    {
        return $this->belongsTo(Shoes::class, 'shoes_id');
    }

    public function sizes()
    {
        return $this->belongsTo(Sizes::class, 'size_id');
    }
}
