<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyRate extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'currency_id', 'change_factor', 'status',
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

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
