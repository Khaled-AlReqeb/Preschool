<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainProductProperty extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'ar_name','en_name','status'
    ];
    protected $appends = [
        'name', 'status_name','has_sub_properties'
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
    public function getHasSubPropertiesAttribute()
    {
        return ($this->sub_properties->count()) ? true : false;
    }
    public function sub_properties()
    {
        return $this->hasMany(MainProductSubProperty::Class);
    }
}
