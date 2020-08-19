<?php

namespace App\Model;

use App\Model\Order;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $fillable = ['product_name', 'product_image', 'product_price', 'quantity', 'total'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }
}
