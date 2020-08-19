@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Order Details
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach($order_details as $order)
                <li class="list-group-item">
                    <div>
                        User Name: <strong>{{ $order->order->user_name }}</strong>
                    </div>
                    <div>
                        User Phone: <strong>{{ $order->order->user_phone }}</strong>
                    </div>
                    <div>
                        User Address: <strong>{{ $order->order->user_address }}</strong>
                    </div>
                    <div>
                        Product Name: <strong>{{ $order->product_name }}</strong>
                    </div>
                    <div>
                        Product Price: <strong>{{ $order->product_price }}</strong>
                    </div>
                    <div>
                        Quantity: <strong>{{ $order->quantity }}</strong>
                    </div>
                    <div>
                        Total: <strong>{{ $order->total }}</strong>
                    </div>
                    <div>
                        From: <strong>{{ $order->created_at->toDateString() }}</strong>
                    </div>
                </li>
            @endforeach
        </ul>
        
    </div>
</div>
@endsection