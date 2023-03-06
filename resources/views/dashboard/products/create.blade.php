@extends('layouts.dashboard')
@section('content')
    <div class="col-12">

                <form method="post" action="{{ route('products.store') }}">
                    @csrf


                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>


                    <div class="form-group mt-2">
                        <label for="category_id">Categories</label>
                        <select class="form-control" name="category_id" id="category_id">
                            {!! $categories !!}
                        </select>
                    </div>



                    <div class="form-group mt-2">
                        <label for="user">User</label>
                        <select class="form-control" name="user_id" id="user">
                            @foreach($users as $user)
                                    <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-2">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>


                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary mt-xl-4">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
