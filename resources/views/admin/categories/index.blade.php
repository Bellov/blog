@extends('layouts.app')


@section('content')
    @include('admin.includes.flash-messages')

    <div class="card-body">
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Category</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @if($categories->count()>0)
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            {{$category->name}}
                        </td>

                        <td>
                            <a href="{{route('category.edit',['id' => $category->id])}}" class="btn btn-dark btn-sm">
                                <span>Edit</span>
                            </a>
                        </td>

                        <td>
                            <a href="{{route('category.delete',['id'=> $category->id])}}" class="btn btn-dark btn-sm">
                                <div id="catDelete">Remove</div>
                            </a>

                        </td>
                    </tr>
                @endforeach
                @else
                    <div class="alert alert-dark" role="alert">
                        You don`t have categories
                    </div>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
