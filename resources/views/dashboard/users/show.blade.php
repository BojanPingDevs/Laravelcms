@extends('layouts.dashboard')
@section('content')
    <div class="col-12">
        <h1>Welcome {{ $user->name }}</h1>
        <p>Your email address is: {{ $user->email }}</p>
        <p>You have created your account {{ $user->created_at->diffForHumans() }}</p>

        <ul>
            @foreach($user->products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>

        <form method="post" action="{{ route('users.destroy', $user->id) }}">
            @method('DELETE')
            @csrf

            <button type="submit" class="btn btn-danger">Delete</button>
        </form>

    </div>
@endsection
