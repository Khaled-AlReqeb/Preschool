<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ar_name', 'en_name', 'logo', 'status',
    ];

    protected $appends = [
        'name', 'status_name',
    ];

    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at',
    ];
    public function getNameAttribute()
    {
        return $this->{app()->getLocale() . '_name'};
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
    public function getLogoAttribute($value)
    {
        return isset($value) ? asset($value) : $value ;
    }
}
