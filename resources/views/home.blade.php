@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in! Your account is:
                        {{auth()->user()->verified() ? " verified" : ' not verified'}}

                        <a href="change-password" class="btn btn-success">Change Password</a>

                        @if(session()->get('msg'))
                            <h4 style="color: red;">{{session()->get('msg')}}</h4>
                        @endif
                        {!! Form::open(['url'=>'images-upload','style'=>'border:1px solid;padding:10px;margin-top:15px','enctype'=>'multipart/form-data']) !!}
                        <input type="file" multiple class="form-control" name="image[]">
                        <br>
                        <button type="submit" class="btn btn-success">Upload files</button>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">All images</div>

                    <div class="panel-body">
                        @foreach($all_images as $image)
                            <img src="{{asset('uploads/'.$image->image)}}" style="height: 150px;margin: 5px">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
