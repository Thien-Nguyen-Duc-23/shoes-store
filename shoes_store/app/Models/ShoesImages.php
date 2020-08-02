<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoesImages extends Model
{
    use SoftDeletes;

    protected $table = 'shoes_images';
    protected $dates = ['deleted_at'];

    const DIRECTORY = 'shoes_image';

    protected $fillable = [
        'shoes_id',
        'image',
        'created_at',
        'updated_at',
    ];

    public function shoes()
    {
        return $this->belongsTo(Shoes::class, 'shoes_id');
    }
}
