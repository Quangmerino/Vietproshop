<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function product_order()
    {
        return $this->hasMany(ProductOrder::class, 'order_id', 'id');
    }
}
