@extends('layouts.app')

@section('content')
    @include('admin.includes.flash-messages')
    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h5>Update Category</h5>

        </div>

        <div class="card-body">
            <form action="{{route('category.update',['id'=>$category->id])}}" method="POST">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="title">Name of category:</label>
                    <input type="text" value="{{$category->name}}" name="name" class="form-control" >
                </div>

                <div class="form-group">
                    <div class="text text-lg">
                        <button class="btn btn-dark btn-sm" type="submit">
                            Update
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
