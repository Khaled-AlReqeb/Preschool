<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id', 'en_name', 'ar_name', 'flag_image', 'code', 'native_name', 'continent_id', 'status',
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

    public function getFlagImageAttribute($value)
    {
        return !is_null($value) ? asset($value) : $value;
    }

    public function continent()
    {
        return $this->belongsTo(Continent::class);
    }

    public function phoneCodes()
    {
        return $this->hasMany(CountryPhoneCode::class, 'country_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'country_id', 'id');
    }
}
