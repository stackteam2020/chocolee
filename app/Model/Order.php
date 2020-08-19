<?php

namespace App\Model;

use App\Model\OrderDetails;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_name', 'user_phone', 'user_address', 'flag', 'status'];

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }
}
