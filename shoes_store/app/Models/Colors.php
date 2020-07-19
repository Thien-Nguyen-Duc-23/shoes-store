<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function shoesColors()
    {
        return $this->hasMany(ShoesColors::class, 'color_id');
    }
}
