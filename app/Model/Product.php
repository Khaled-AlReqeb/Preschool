<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Product
 * @package App\Model
 * @method static findOrFail($get)
 */
class Product extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'store_id', 'category_id', 'brand_id', 'ar_name',
        'en_name', 'ar_description', 'en_description','cover',
        'price', 'quantity', 'per_order', 'discount','is_featured',
        'end_discount','minimum_level','original_price','status',
    ];
    protected $appends = [
        'name' , 'description','status_name','is_featured_name',
    ];
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at',
    ];
    public function getNameAttribute()
    {
        return $this->{app()->getLocale() . '_name'};
    }
    public function getDescriptionAttribute()
    {
        return $this->{app()->getLocale() . '_description'};
    }

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 'inactive':
                return admin('inactive');
                break;
            case 'active':
                return admin('active');
                break;
            default:
                return admin('Unknown Status');
        }
    }
    public function getIsFeaturedNameAttribute()
    {
        switch ($this->is_featured) {
            case 'yes':
                return admin('yes');
                break;
            case 'no':
                return admin('no');
                break;
            default:
                return admin('Unknown Status');
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function getCoverAttribute($value)
    {
        return isset($value) ? asset($value) : $value ;
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
