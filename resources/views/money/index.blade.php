@extends('layouts.master')
@section('head')
<style>
    .card#krop {
        border-color: #393e82;
    }

    .card-body#lekpad {
        padding: 10px;
    }

    .card-body#medpad {
        padding: 15px;
    }
</style>
@section('title','Welcome Homepage')
@section('content')
<br><br><br><br><br>
<div class="container ">
    <div class="row">

        <div class="">
            <br><br>

            <h1><b>FUNDING</b></h1>

            <div style="text-align:right">
                <a href="{{route('money.create')}}" class="btn btn-success">ADD Post</a>
            </div><br><br>
            @if(count($errors) > 0)
            <div class="alert alert-danger fade in alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true" style="font-size:20px">×</span> </button>
                <ul> @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(\Session::has('success'))
            <div class="alert alert-success fade in alert-dismissible show">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true" style="font-size:20px">×</span> </button>
                <p>{{ \Session::get('success')}}</p>
            </div>
            @endif
            <br>

            <!-- Modal Header -->
            @if(Auth::check() && Auth::user()->roleid==1)
            @foreach($money as $row)
            <br>
            <div class="container" style="width:100rem">
                <div class="card" id="krop">
                    <div class="card-body" id="lekpad">
                        <h4 class="card-title" style="margin-top:8px">Money :
                            {{$row['money']}}
                        </h4>
                        <hr>
                    </div>



                    <!-- Modal body -->
                    <div class="card-body" id="medpad">
                        <a href="{{action('MoneyController@edit', $row['id'])}}" class="btn btn-primary ">Edit</a>
                        <form method="post" class="delete_form" action="{{action('MoneyController@destroy',$row['id'])}}">
                            @csrf
                            <p>Guest | {{$row['id']}}</p>
                            <input type="hidden" name="_method" value="DELETE" />

                            <button type="submit" style='float:right;' class="btn btn-danger">Delete</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endforeach
@endif
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection