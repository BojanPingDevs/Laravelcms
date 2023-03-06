@extends('layouts.dashboard')
@section('content')

            <div class="col-12">
                <a href="{{ route('products.create') }}" class="btn btn-success ">+Додади Продукт</a>
                <hr class="my-5">
            </div>

            <div class="table-responsive table-card table-nowrap">
                <table class="table align-middle table-hover mb-0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>title</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Category_id</th>
                        <th>Description</th>
                        <th>User_id</th>
                        <th class="text-end">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td><a href="{{ route('products.show', $product->id) }}">{{ $product->id }}</a></td>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->slug }}</td>
                            <td>{{ $product->image }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->user_id }}</td>
                            <a href="{{route ('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                            <form method="post" action="{{ route('products.destroy', $product->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        </div>

        </div>
@endsection
