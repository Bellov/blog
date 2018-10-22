@extends('layouts.app')
@section('content')

<div class="card-deck mb-3 text-center">
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Published Posts</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$posts_count}}</h1>

        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Trashed Posts</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$trash_posts_count}}</h1>

        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Users</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$users_count}}</h1>

        </div>
    </div>
    <div class="card mb-4 box-shadow">
        <div class="card-header">
            <h4 class="my-0 font-weight-normal">Categories</h4>
        </div>
        <div class="card-body">
            <h1 class="card-title pricing-card-title">{{$categories_count}}</h1>

        </div>
    </div>
</div>
@endsection
