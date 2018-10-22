@extends('layouts.app')
@section('content')

<div class="card-body">
    <div class="text-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Trash</th>
                </tr>
            </thead>
            <tbody>
                @if($posts->count()>0) @foreach($posts as $post)
                <tr>
                    <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px"></td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{route('post.edit',['id'=>$post->id])}}" class="btn btn-dark btn-sm">Update</a>
                    </td>
                    <td>
                        <a href="{{route('post.delete', ['id'=>$post->id])}}" class="btn btn-danger btn-sm">Trash</a>
                    </td>
                </tr>
                @endforeach @else
                <div class="alert alert-dark" role="alert">
                    You don`t have posts
                </div>
                @endif
            </tbody>
        </table>
    </div>
</div>
{{ $posts->links() }}
@endsection
