<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Order extends Model
{
    protected $guarded = [];

    use HasFactory;
    public function cart()
    {
        return $this->hasMany(Cart::class, 'order_id');
    }
}
