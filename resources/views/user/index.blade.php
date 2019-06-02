@extends('user.master')
@section('head')
@section('title','Welcome Homepage')
@section('content')
<div class= "container">
    <div class = "row">
        <div class = "col-md-12">
        <br><br>
            <h1><b>CREATE A POST</b></h1>
            <div align="left">
            <a href="{{route('user.create')}}" class="btn btn-success">ADD Post</a>
            </div><br>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul> @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        
            @if(\Session::has('success'))
                <div class = "alert alert-success">
                    <p>{{ \Session::get('success')}}</p>
                </div>
            @endif
            <!-- <table  class="table table-borderless"> -->
            <table class="webboard_display_small tplImport-table" width="700" border="" align="center" cellspacing="20" cellpadding="20" style="padding:10px;border:2px solid #0784C8;">
                <!-- <tr>
                    
                </tr> -->
                @foreach($users as $row)
                <tr>
                    <th colspan="2" style="font-size:30px">{{$row['schoolname']}}</th>
                    
                    <!-- <td>{{$row['id']}}</td> -->
                    <!-- <td>{{$row['schoolname']}}</td>
                    <td>{{$row['lname']}}</td>
                    <td>
                        <a href="{{action('UsersController@edit', $row['id'])}}" class="btn btn-primary">
                            Edit</a>
                    </td>
                    <td>
                        <form method = "post" class= "delete_form" action="{{action('UsersController@destroy',$row['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" />
                        <button type= "submit" class= "btn btn-danger">Delete</button>
                        </form>
                        
                    </td> -->
                </tr>
                
                <tr>
                    <td colspan="2">  {{$row['lname']}}
                    <form method = "post" class= "delete_form" action="{{action('UsersController@destroy',$row['id'])}}">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="DELETE" /><br>
                        
                        <button type= "submit" style='float:right;' class= "btn btn-danger">Delete</button>
                        
                        </form>
                    </td>    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('.delete_form').on('submit', function(){
        if(confirm("You want to delete this info.")){
            return true;
        }else{
            return false;
        }
    });
});
</script>

@endsection
