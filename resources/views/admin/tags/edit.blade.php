@extends('layouts.app')

@section('content')
    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h5>Update Tag</h5>

        </div>

        <div class="card-body">
            <form action="{{route('tag.update',['id'=>$tag->id])}}" method="POST">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="tag">Name of Tag:</label>
                    <input type="text" value="{{$tag->tag}}" name="tag" class="form-control" >
                </div>

                <div class="form-group">
                    <div class="text text-lg">
                        <button class="btn btn-dark" type="submit">
                            Update
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
