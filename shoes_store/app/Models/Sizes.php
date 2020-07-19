<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
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
