@extends('layouts.app')

@section('content')

    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h3>Create a new user</h3>
        </div>

        <div class="card-body">
            <form action="{{route('user.store')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="name">Name of user:</label>
                    <input type="text" name="name" class="form-control" placeholder="Write a name of the user">
                </div>

                <div class="form-group col-lg-8">
                    <label for="email">Email of user:</label>
                    <input type="text" name="email" class="form-control" placeholder="Write a email of the user">
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
