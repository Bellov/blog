@extends('layouts.app')

@section('content')

    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h3>Edit your profile</h3>
        </div>

        <div class="card-body">
            <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="name">Name:</label>
                    <input type="text" name="name"  value={{$user->name}} class="form-control" placeholder="Edit your name">
                </div>

                <div class="form-group col-lg-8">
                    <label for="email">Email:</label>
                    <input type="text" name="email" value={{$user->email}} class="form-control" placeholder="Change email">
                </div>

                <div class="form-group col-lg-8">
                    <label for="password">New Password:</label>
                    <input type="password" name="password" class="form-control" placeholder="Change password">
                </div>


                <div class="card-body">
                    <label>Current avatar:</label><br>
                    <img src="{{ asset($user->profile->avatar) }}"
                         alt="" width="90px" height="60px" style="border-radius: 50%;">
                </div>


                <div class="form-group col-lg-8">
                    <label for="avatar">Upload new avatar:</label>
                    <input type="file" name="avatar" class="form-control" placeholder="Change your avatar">
                </div>

                <div class="form-group col-lg-8">
                    <label for="facebook">Facebook profile:</label>
                    <input type="text" name="facebook" value={{$user->profile->facebook }} class="form-control" placeholder="Facebook">
                </div>

                <div class="form-group col-lg-8">
                    <label for="youtube">Youtube profile:</label>
                    <input type="text" name="youtube" value={{$user->profile->youtube}} class="form-control" placeholder="Youtube">
                </div>

                <div class="form-group col-lg-8">
                    <label for="about">About you:</label>
                    <textarea name="about" id="about" cols="15" rows="10" class="form-control" >{{$user->profile->about}}
                    </textarea>
                </div>

                <div class="form-group">
                    <div class="text text-lg">
                        <button class="btn btn-dark" type="submit">
                            Save
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
