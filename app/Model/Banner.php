<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'en_title', 'ar_title', 'image', 'url', 'type','route_type','item_id', 'status',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'title', 'type_name', 'status_name','route_type_name',
    ];

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
    public function getRouteTypeNameAttribute()
    {
        switch ($this->status) {
            case 'product':
                return admin('product');
                break;
            case 'category':
                return admin('category');
                break;
            default:
                return admin('Unknown Status');
        }
    }

    public function getTypeNameAttribute()
    {
        switch ($this->type) {
            case 'internal':
                return admin('internal');
                break;
            case 'external':
                return admin('external');
                break;
            default:
                return admin('Unknown Type');
        }
    }

    public function getTitleAttribute()
    {
        return $this->{app()->getLocale() . '_title'};
    }

    public function getImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : $value;
    }
}
