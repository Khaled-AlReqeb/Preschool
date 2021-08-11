<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminNotification extends Model
{
    use SoftDeletes;
    protected $fillable = [
         'title', 'content', 'channels','user_type','users', 'icon', 'status',
    ];

    protected $hidden = [
        'updated_at','created_at', 'deleted_at',
    ];

    protected $appends = [
        'status_name'
    ];
    protected $casts = [
        'channels' => 'array',
        'users' => 'array',
    ];

    public function getStatusNameAttribute()
    {
        switch ($this->status) {
            case 'sent':
                return admin('sent');
                break;
            case 'faild':
                return admin('faild');
                break;
            default:
                return admin('Unknown Status');
        }
    }
}
