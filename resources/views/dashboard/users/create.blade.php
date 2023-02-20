@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <div class="col-12">
            <div class="row ">
                <div class="col-8">

                    <form method="post" action="{{ route('users.store') }}">
                        @csrf

                        <div class="form-group mt-2 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" aria-describedby="YourName" name="name">
                            @error ('name')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-2 col-md-6">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" aria-describedby="emailHelp" name="email">
                            @error ('email')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mt-2 col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                            @error ('password')
                            <span>
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mt-xl-4">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
