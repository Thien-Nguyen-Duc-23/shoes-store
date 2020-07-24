<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;

    protected $table = 'categories';
    protected $dates = [
        'deleted_at',
    ];

    const DIRECTORY = 'category';

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
