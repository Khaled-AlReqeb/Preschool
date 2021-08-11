<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreFeature extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ar_name', 'en_name', 'ar_content', 'en_content', 'status', 
    ];

    protected $hidden = [
        'updated_at','created_at', 'deleted_at',
    ];

    protected $appends = [
        'name', 'content','status_name'
    ];

    public function getNameAttribute()
    {
        return $this->{app()->getLocale().'_name'};
    }
    public function getContentAttribute()
    {
        return $this->{app()->getLocale().'_content'};
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

}
