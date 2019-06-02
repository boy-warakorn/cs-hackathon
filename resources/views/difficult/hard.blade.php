@extends('layouts.master')
<style>
    .card#krop {
        border-color: #393e82;
    }
    .card-body#lekpad{
        padding: 10px;
        background-color: #ebb800;
        height: 60px;
        color: white;
    }
    .card-body#medpad{
        padding: 15px;
    }
</style>
@section('content')
<br><br><br><br><br>
<div>
  @foreach(DB::table('posts')->where('difficult', '1')->get() as $row)
  <br>
  <div class="container" style="width:100rem">
    <div class="card" id="krop">
      <div class="card-body" id="lekpad">
        <h4 class="card-title" style="margin-top:8px">School :
          {{$row->schoolname}}
        </h4>
        <hr>
      </div>
      <!-- Modal body -->
      <div class="card-body" id="medpad">
        <div class="card-text">
          <p>Description : {{$row->description}}</p>
          <p>Phone number :{{$row->phonenumber}}</p>
        </div>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
<br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br> <br><br><br>
@endsection