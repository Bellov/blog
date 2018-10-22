@extends('layouts.app')
@section('content')
    @include('admin.includes.flash-messages')
    @include('admin.includes.errors')

<div class="panel panel-default">
    <div class="panel card-body">
        <h3>Update post</h3>
    </div>

    <div class="panel-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" class="form-control" placeholder="Write a title" value="{{$post->title}}">
            </div>

            <div class="form-group">
                <label for="featured">Featured Image:</label>
                <input type="file" name="featured" class="form-control" id="featured">
            </div>

            <div class="form-group">
                <label for="category">Select a Category</label>
                <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                               @if($post->category->id == $category->id)
                                   selected
                               @endif
                            >{{$category->name}}</option>s
                        @endforeach
                    </select>
            </div>

            <div class="form-group">
                <label for="tags">Select a tag</label> @foreach($tags as $tag)
                <div class="custom-checkbox">
                    <label><input type="checkbox"  name="tags[]" value="{{$tag->id}}"

                                 @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                 @endforeach
                                > {{$tag->tag}}</label>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea type="text" name="content" class="form-control" id="content" rows="5" placeholder="Write a comment">{{$post->content}}
                    </textarea>
            </div>

            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-dark" type="submit">
                            Update Post
                        </button>
                </div>
            </div>


        </form>
    </div>
</div>
@endsection
