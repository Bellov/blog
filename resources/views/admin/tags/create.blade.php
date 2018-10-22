@extends('layouts.app')

@section('content')
    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h3>Create a new tag</h3>
        </div>

        <div class="card-body">
            <form action="{{route('tag.store')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="tag">Name of tag:</label>
                    <input type="text" name="tag" class="form-control" placeholder="Write a tag">
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
