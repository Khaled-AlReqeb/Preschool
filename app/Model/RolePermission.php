<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $fillable =[
        'role_id','role_detail_id','value',
    ];

    public function role_detail()
    {
        return $this->belongsTo(RoleDetail::class);
    }
}
