@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Edit Category
    </div>

    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('partials.errors')
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" class="form-control" name="name" value="{{ $category->name }}">
            </div>
            <button class="btn btn-primary">Update Category</button>
        </form>
    </div>
</div>

@endsection