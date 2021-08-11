<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;
    protected $fillable=[
        'user_id', 'store_name', 'store_email', 'store_mobile', 'logo', 'description', 'status',
    ];
    public function getLogoAttribute($value)
    {
        return isset($value) ? asset($value) : $value;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
