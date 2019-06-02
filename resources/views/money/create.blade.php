@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="{!!asset('css/styleIndex.css')!!}">
@section('title','CreatePost')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12"><br><br>
            <h2 align="center"><b> CREATE A MONEY </b></h2><br>

            <!-- ดักข้อมูล -->
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul> @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif

            <form method="post" action="{{url('money')}}">
                {{csrf_field()}}

                <div class="form-group">
                    <input type="text" name="money" class="form-control" placeholder="Your new Money" />
                </div>
                <br>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="submit" />
                </div>

            </form>

        </div>
    </div>
</div>

@endsection