<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CountryPhoneCode extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'id','country_id', 'code', 'status',
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    protected $appends = [
        'status_name'
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

    public function Country()
    {
        return $this->belongsTo(Country::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'phone_code_id', 'id');
    }
}
