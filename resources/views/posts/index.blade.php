@extends('layouts.master')
@section('head')
<style>
    .card#krop {
        border-color: #393e82;
    }
    .card-body#lekpad{
        padding: 10px;
    }
    .card-body#medpad{
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
            @if(Auth::check() && Auth::user()->roleid == 1)
            <h1><b>ALL POST</b></h1>
            @endif
            @if(Auth::check() == false)
            <h1><b>Thank you for your information</b></h1>
            @endif
            <div style="text-align:right">
                <a href="{{route('posts.create')}}" class="btn btn-success">ADD Post</a>
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
            @if(Auth::check() == false)
            <br><br><br><br>  <br><br><br><br>  <br><br><br><br>  <br><br><br><br>  
            @endif
            <!-- Modal Header -->
            @if(Auth::check() && Auth::user()->roleid == 1)
            @foreach($posts as $row)
            <br>
            <div class="container" style="width:100rem">
                <div class="card" id="krop">
                    <div class="card-body" id="lekpad">
                        <h4 class="card-title"style="margin-top:8px">School : 
                            {{$row['schoolname']}}
                        </h4>
                        <hr>
                    </div>
       


                    <!-- Modal body -->
                    <div class="card-body" id="medpad">
                        <div class="card-text">
                            <p>Description : {{$row['description']}}</p>
                            <p>Phone number :{{$row['phonenumber']}}</p>
                        </div>
                        @if($row['success']==1)
                        <p>Status: Success</p>
                        @endif
                        @if($row['success']==0)
                        <p>Status: Unsuccess</p>
                        @endif

                        <a href="{{action('PostsController@edit', $row['id'])}}" class="btn btn-primary ">Edit</a>
                        <form method="post" class="delete_form" action="{{action('PostsController@destroy',$row['id'])}}">
                            @csrf
                            <p>Guest | {{$row['id']}}</p>
                            <input type="hidden" name="_method" value="DELETE" />

                            <button type="submit" style='float:right;' class="btn btn-danger">Delete</button>

                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>

</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete_form').on('submit', function() {
            if (confirm("You want to delete this info.")) {
                return true;
            } else {
                return false;
            }
        });
    });
</script>

@endsection