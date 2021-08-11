<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'key', 'en_name', 'ar_name', 'ar_value', 'en_value', 'status',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];

    protected $appends = [
        'name', 'value', 'status_name'
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

    public function getValueAttribute()
    {
        return $this->{app()->getLocale() . '_value'};
    }
}
