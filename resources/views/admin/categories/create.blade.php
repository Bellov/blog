@extends('layouts.app')

@section('content')

    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h3>Create a new category</h3>
        </div>

        <div class="card-body">
            <form action="{{route('category.store')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="title">Name of category:</label>
                    <input type="text" name="name" class="form-control" placeholder="Write a category">
                </div>

                <div class="form-group">
                    <div class="text text-lg">
                        <button class="btn btn-dark btn-sm" type="submit">
                            Save
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
