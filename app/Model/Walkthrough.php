<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Walkthrough extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'en_title', 'ar_title', 'en_description', 'ar_description',  'image', 'status',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'title', 'description', 'status_name'
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

    public function getTitleAttribute()
    {
        return $this->{app()->getLocale() . '_title'};
    }

    public function getDescriptionAttribute()
    {
        return $this->{app()->getLocale() . '_value'};
    }

    public function getImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : $value;
    }

}
