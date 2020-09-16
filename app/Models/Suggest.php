<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suggest extends Model
{
    protected $table = 'suggest';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function product_cate(){
        return $this->belongsTo(Categories::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
