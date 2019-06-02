@extends('user.master')
@section('title','Edit')
@section('head')
@section('content')
<div class="container">
    <div class="row">
        <div class= "col-md-12"<br>
            <h3 align = "center"> EDIT </h3><br>

            <!-- ดักข้อมูล -->
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        
            <form method = "post" action="{{action('UsersController@update', $id)}}">
                {{csrf_field()}}
                <div class = "form-group">
                    <input type="text" name= "schoolname" class="form-control" placeholder="Firstname" value="{{$user->schoolname}}"/>
                </div>
                <div class = "form-group">
                    <input type="text" name= "lname" class="form-control" placeholder="Lastname" value="{{$user->lname}}"/>
                </div>
                <div class = "form-group">
                    <input type="submit" class="btn btn-primary" value="Update"/>
                </div>
                <input type="hidden" name="_method" value="PATCH" />
            </form>
        </div>
    </div>
</div>
@endsection