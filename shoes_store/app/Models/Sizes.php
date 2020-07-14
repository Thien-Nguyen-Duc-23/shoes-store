<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Sizes extends Model
{
    // use SoftDeletes;

    protected $table = 'sizes';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function shoesSizes()
    {
        return $this->hasMany(ShoesSizes::class, 'size_id');
    }
}
