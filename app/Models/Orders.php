<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','product_id','amount','buyer_name','buyer_contact','status','address'
    ];

    public $timestamps = false;
}
