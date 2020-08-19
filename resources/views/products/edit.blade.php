@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Product
    </div>

    <div class="card-body">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('partials.errors')
            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="">Product Description</label>
                <textArea type="text" class="form-control" name="description">{{ $product->description }}</textArea>
            </div>
            <div class="form-group">
                <label for="">Product price</label>
                <input type="number" min=1 class="form-control" name="price" value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="">Product Image</label>
                <img src="{{ asset('uploadedImages/products/'.$product->image) }}" height="40px" width="50px" alt="">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <label for="">Product Quantity</label>
                <input type="number" min=1 class="form-control" name="quantity" value="{{ $product->quantity }}">
            </div>

            <button class="btn btn-primary">Update Product</button>
        </form>
    </div>
</div>

@endsection