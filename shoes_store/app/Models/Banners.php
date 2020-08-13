<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banners extends Model
{
    use SoftDeletes;

    protected $table = 'banners';
    protected $dates = [
        'deleted_at',
    ];

    const DIRECTORY = 'banners';

    protected $fillable = [
        'name',
        'url',
        'image',
        'status',
        'created_at',
        'updated_at',
    ];
}
