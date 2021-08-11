<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminContact extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'mobile', 'type', 'subject', 'content', 'reply', 'status',
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
        return $this->first_name .' '.$this->last_name;
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    // Filter Scopes
    public function scopeByReplay($query, $replyChecker) {
        return $replyChecker == 'part' ? $query->where('reply', null) : $query;
    }
}
