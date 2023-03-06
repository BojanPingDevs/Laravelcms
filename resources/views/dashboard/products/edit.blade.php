@extends('layouts.dashboard')
@section('content')
    <div class="col-12">

        <form method="post" action="{{ route('products.update', $product->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $product->name }}"
            </div>

            <div class="form-group">
                <label for="categories">Categories:</label>
                <input type="text" name="categories" id="categories" class="form-control" value="{{ $product->name }}"
            </div>

            <div class="form-group">
                <label for="user">User:</label>
                <input type="text" name="user" id="user" class="form-control" value="{{ $product->name }}"
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" class="form-control" value="{{ $product->name }}"
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ $product->name }}"
            </div>
            <button type="submit" class="btn btn-primary mt-xl-4">Update product</button>
        </form>
    </div>
@endsection
