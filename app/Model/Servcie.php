<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servcie extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'en_name', 'ar_name','ar_description', 'en_description', 'image', 'status',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'name', 'status_name'
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

    public function getNameAttribute()
    {
        return $this->{app()->getLocale() . '_name'};
    }

    public function getImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : $value;
    }
}
