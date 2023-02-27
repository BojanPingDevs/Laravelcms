@extends('layouts.dashboard')
@section('content')

    <div class="row">
        <div class="col-4">
            <a href="{{ route('users.create') }}" class="btn btn-success ">+ Додади Корисник</a>
            <hr class="my-5">
        </div>

        <div class="table-responsive table-card table-nowrap">
            <table class="table align-middle table-hover mb-0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>User</th>
                    <th>Status</th>
                    <th class="text-end">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <td>1</td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h6 class="mb-0">{{ $user->name }}</h6>
                                <small class="text-muted">{{ $user->email }}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="badge bg-success fs-6">{{ $user->role->name }}</span>
                    </td>
                    <td>
                        <div class="width-120">
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-end align-items-center">
                            <a href="{{ route('users.show', $user->id) }}" data-tippy-content="View user">
                                <span class="material-symbols-rounded align-middle fs-5 text-body">visibility</span>
                            </a>
                            <!--Divider line-->
                            <span class="border-start mx-2 d-block height-20"></span>
                            <a href="{{ route('users.edit', $user->id) }}" data-tippy-content="Edit user">
                                <span class="material-symbols-rounded align-middle fs-5 text-body">edit</span>
                            </a>
                            <!--Divider line-->
                            <span class="border-start mx-2 d-block height-20"></span>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-tippy-content="Delete user">
                                    <span class="material-symbols-rounded align-middle fs-5 text-body">delete</span>
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    </div>

    </div>
@endsection
