@extends('layouts.app')

@section('content')

    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h3>Create a new post</h3>
        </div>

        <div class="panel-body">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" placeholder="Write a title">
                </div>

                <div class="form-group">
                    <label for="featured">Featured Image:</label>
                    <input type="file" name="featured" class="form-control" id="featured">
                </div>

                <div class="form-group">
                    <label for="category">Select a Category</label>
                    <select name="category_id" id="category" class="form-control" >
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select a tag</label>
                   @foreach($tags as $tag)
                    <div class="custom-checkbox">
                        <label><input type="checkbox"  name="tags[]" value="{{$tag->id}}"> {{$tag->tag}}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content:</label>
                    <textarea type="text" name="content" class="form-control"
                              id="content" rows="5" placeholder="Write a comment">
                    </textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-dark btn-sm" type="submit">
                            Published
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



