<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    protected $table = 'news';
    protected $dates = ['deleted_at'];

    const DIRECTORY = 'news';
    const ACTIVE = 1;
    const DEACTIVATE = 0;
    const IS_SALE = 1;

    protected $fillable = [
        'slug',
        'name',
        'image',
        'title',
        'sort_description',
        'long_description',
        'status',
        'created_at',
        'updated_at',
    ];
}
