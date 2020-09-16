<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_detail';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function order()
    {

        return $this->belongTo(User::class);
    }

    public function product()
    {

        return $this->belongTo(Product::class);
    }
}
