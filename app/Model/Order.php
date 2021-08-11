<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;


    protected $fillable = [
        'product_id', 'client_id', 'price', 'quantity',
//        'product_id', 'client_id', 'store_id', 'price', 'quantity',
    ];
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at',
    ];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
//    public function store()
//    {
//        return $this->belongsTo(Store::class);
//    }
}
