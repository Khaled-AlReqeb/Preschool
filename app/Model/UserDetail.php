<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserDetail extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'id', 'user_id', 'city_id', 'region_id', 'forget_code', 'activation_code', 'is_activated',
        'activation_code_request_at', 'activation_code_request_count', 'is_notification_enabled',
        'facebook', 'instagram', 'twitter', 'google', 'latitude', 'longitude', 'status',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

}
