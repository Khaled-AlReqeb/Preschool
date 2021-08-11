<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use SoftDeletes;

    protected $guarded = [];


    protected $fillable = [
        'name', 'email', 'mobile', 'password',
    ];
    protected $hidden = [
        'password', 'updated_at', 'created_at', 'deleted_at',
    ];
}
