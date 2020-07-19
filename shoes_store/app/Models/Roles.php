<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = 'roles';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'created_at',
        'updated_at',
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class, 'role_id');
    }
}
