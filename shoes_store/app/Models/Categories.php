<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $table = 'colors';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'description',
        'image',
        'created_at',
        'updated_at',
    ];

    public function shoes()
    {
        return $this->hasMany(Shoes::class, 'category_id');
    }
}
