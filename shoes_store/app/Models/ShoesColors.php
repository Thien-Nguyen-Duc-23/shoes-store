<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoesColors extends Model
{
    use SoftDeletes;

    protected $table = 'shoes_colors';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'shoes_id',
        'color_id',
        'created_at',
        'updated_at',
    ];

    public function shoes()
    {
        return $this->belongsTo(Shoes::class, 'shoes_id');
    }

    public function colors()
    {
        return $this->belongsTo(Colors::class, 'color_id');
    }
}
