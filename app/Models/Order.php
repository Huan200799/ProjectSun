<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function user()
    {

        return $this->belongTo(User::class);
    }

    public function orderdetail()
    {

        return $this->hasMany(OrderDetail::class);
    }
}
