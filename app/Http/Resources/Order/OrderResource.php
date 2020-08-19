<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'product' => $this->product->name,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'total' => $this->total,
            'flag' => $this->flag,
            'status' => $this->status
        ];
    }
}
