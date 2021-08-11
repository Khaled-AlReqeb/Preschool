<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainStoreProductProperty extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'store_id', 'main_product_property_id',
    ];
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at',
    ];
    public function getNameAttribute()
    {
        return $this->{app()->getLocale() . '_name'};
    }
    public function main_product_property()
    {
        return $this->belongsTo(MainProductProperty::class);
    }
}
    
