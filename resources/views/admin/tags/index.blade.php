@extends('layouts.app')


@section('content')

    <div class="card-body">
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Tag</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @if($tags->count()>0)
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->tag}}
                            </td>

                            <td>
                                <a href="{{route('tag.edit',['id' => $tag->id])}}" class="btn btn-dark btn-sm">
                                    <span>Edit</span>
                                </a>
                            </td>

                            <td>
                                <a href="{{route('tag.delete',['id'=> $tag->id])}}" class="btn btn-dark btn-sm">
                                    <div id="catDelete">Remove</div>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="alert alert-dark" role="alert">
                        You don`t have tags
                    </div>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
