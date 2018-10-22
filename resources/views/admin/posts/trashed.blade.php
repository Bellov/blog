@extends('layouts.app')

@include('admin.includes.flash-messages')


@section('content')
    <div class="card-body">
        <div class="text-center">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Avatar</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($posts->count()>0)
                    @foreach($posts as $post)
                    <tr>
                        <td><img src="{{$post->featured}}" alt="{{$post->title}}"
                                 width="90px" height="50px"></td>
                        <td>{{$post->title}}</td>
                        <td>
                            <a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-success btn-sm">Restore</a>
                            <a href="{{route('post.fullDelete',['id'=>$post->id])}}" class="btn btn-danger delete btn-sm" >Delete</a>
                        </td>
                        <td>

                        </td>
                    </tr>
                @endforeach
                @else
                    <div class="alert alert-dark" role="alert">
                        No Trashed Posts
                    </div>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
