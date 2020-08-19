@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        All Orders
    </div>
    <div class="card-body">
        <ul class="list-group">
            @foreach($orders as $order)
                <li class="list-group-item">
                    <div>
                        Order ID: <a href="{{ route('orders.show', $order->id)}}"> {{ $order->id }}</a>
                    </div>
                </li>
            @endforeach
        </ul>
        
    </div>
</div>
@endsection