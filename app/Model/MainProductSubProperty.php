<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainProductSubProperty extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ar_name','en_name','main_product_property_id','status'
    ];
    protected $appends = [
        'name', 
    ];
    public function getNameAttribute()
    {
        return $this->{app()->getLocale() . '_name'};
    }
 
}
