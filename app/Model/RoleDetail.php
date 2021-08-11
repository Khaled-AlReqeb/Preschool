<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleDetail extends Model
{
    protected $fillable = [
        'id','key_word','ar_name','en_name',
    ];

    protected $appends = [
        'name',
    ];

    public function getNameAttribute(Type $var = null)
    {
        return $this->{app()->getLocale(). '_name'};
    }
}
