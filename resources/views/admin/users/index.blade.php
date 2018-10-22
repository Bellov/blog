@extends('layouts.app')

@section('content')
    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')
    <div class="card-body">
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Email</th>
                    <th scope="col">Permissions</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>

                @if($users->count()>0)
                    @foreach($users as $user)
                        <tr>

                            <td>
                                <img src="{{ asset($user->profile->avatar) }}"
                                     alt="" width="60px" height="60px" style="border-radius: 50%;">
                            </td>

                            <td>
                                {{$user->email}}
                            </td>

                            <td>
                                @if($user->admin)
                                    <a href="{{route('admin.remove',['id' => $user->id])}}" class="btn btn-danger btn-sm">Remove Permissions</a>
                                @else
                                    <a href="{{route('user.admin',['id' => $user->id])}}" class="btn btn-dark btn-sm">Make admin</a>
                                @endif
                            </td>

                            <td>
                                @if(Auth::id() !== $user->id)
                                <a href="{{route('user.remove',['id' => $user->id])}}" class="btn btn-dark btn-sm">Remove User</a>
                                @endif
                            </td>


                        </tr>
                    @endforeach
                @else
                    <div class="alert alert-dark" role="alert">
                        No users
                    </div>
                @endif
                </tbody>
            </table>
        </div>
    </div>
    {{ $users->links() }}
@endsection
