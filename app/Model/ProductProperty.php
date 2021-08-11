<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductProperty extends Model
{
    protected $fillable = [
        'product_id', 'main_product_property_id', 'sub_main_property_id', 'additional_price', 'other_values', 
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function main_product_property()
    {
        return $this->belongsTo(MainProductProperty::class);

    }
    public function main_product_sub_property()
    {
        return $this->belongsTo(MainProductSubProperty::class,'sub_main_property_id','id');

    }
}
