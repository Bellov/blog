@extends('layouts.app')

@section('content')

    @include('admin.includes.flash-messages')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel card-body">
            <h3>Edit blog settings</h3>
        </div>

        <div class="card-body">
            <form action="{{route('settings.store')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group col-lg-8">
                    <label for="site_name">Site name:</label>
                    <input type="text" name="site_name" class="form-control" placeholder="Write a new site name" value="{{$settings->site_name}}">
                </div>

                <div class="form-group col-lg-8">
                    <label for="contact_number">Contact number:</label>
                    <input type="text" name="contact_number" class="form-control" placeholder="Write a new contact number" value="{{$settings->contact_number}}">
                </div>

                <div class="form-group col-lg-8">
                    <label for="contact_email">Contact email:</label>
                    <input type="text" name="contact_email" class="form-control" placeholder="Write a new contact email" value="{{$settings->contact_email}}">
                </div>

                <div class="form-group col-lg-8">
                    <label for="address">Address:</label>
                    <input type="text" name="address" class="form-control" placeholder="Write a new address" value="{{$settings->address}}">
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
