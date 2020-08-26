@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        Add New Category
    </div>
    
    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        
            @csrf
            @include('partials.errors')
            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <button class="btn btn-primary">Create Category</button>
        </form>

    </div>
</div>
    

@endsection