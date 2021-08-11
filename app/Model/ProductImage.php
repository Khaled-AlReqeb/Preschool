<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductImage extends Model
{
    use SoftDeletes;

    protected $fillable=[
        'product_id','image',
    ];

    public function getImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : null;
    }
}
