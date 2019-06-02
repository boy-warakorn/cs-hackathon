@extends('layouts.master')

@section('content')

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>EduEco</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="{!! asset('css/styleIndex.css') !!}">

    <!-- Styles -->

</head>

<body>
    <div class="flex-center position-ref full-height">

        <!-- <div class="content"> -->
        <div class="container-fluid">
            <div class="row">
                <img src="{!! asset('images/index.jpg') !!}" id="index">
            </div>
            <br>
            <br>

            <h2><b>ABOUT US</b></h2>
            <br>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-4">
                    <img src="{!! asset('images/school.jpg') !!}" width="80%" id="school">
                </div>
                <div class="col-sm-4">
                    <p id="aboutus">
                        In Thailand has many rural schools that don't get helping. So, we create web page abiut volunteers
                        for teaching about soft skills and hard skills (O-NET) in rural schools in North of Thailand.
                        We have 2 ways to help . First, you who want to be volunteers, you can joins us. And second, you can
                        donate such as money, stationeries  or books. And we have leval about schools that are
                        hard to reach.
                    </p>
                </div>
                <div class="col-sm-2"></div>
            </div>
            <br><br><br>
       
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <h2><b>ACTIVITY IS COMING</b></h2>
                    <br>
                   
                    @if($post = App\Posts::where('check', 1)->first())
                    <div class="gallery">
                        <a target="_blank">
                            <img src="{!! asset('images/act.jpg') !!}" alt="Cinque Terre" width="600" height="400">
                        </a>
                        <div class="desc">
                            <br>
                            <h3><b>{{$post->schoolname}}</b></h3>
                            <p></p>
                        </div>
                        <button class="btn btn-primary" id="join"><b>JOIN</b></button>
                    </div>
                    
                    @else
                    <div class="gallery">
                        <a target="_blank">
                            <img src="{!! asset('images/act.jpg') !!}" alt="Cinque Terre" width="600" height="400">
                        </a>
                        <div class="desc">
                            <br>
                            <h3><b>-NONE-</b></h3>
                            <p></p>
                        </div>
                        <button class="btn btn-primary" id="join"><b>JOIN</b></button>
                    </div>
                   
                    @endif
                
                
                    
                </div>
                @if($money = App\Money::where('id',1))
                <div class="col-sm-6">
                    <img src="{!! asset('images/donate3.png') !!}" width="65%" id="donate">

                    <div class="balance">
                        <b>FUNDING: {{$money->get()->first()->money}} Baht</b>
                        @if(Auth::check() && Auth::user()->roleid == 1)
                        <a href="{{action('MoneyController@index')}}"class="btn btn-danger" id="edit"><b>EDIT</b></a>
                        @endif
                    </div>
                </div>
                @endif
            </div>
            <br>
            <br>

            <h2 id="success"><b>SUCCESS ACTIVITIES</b></h2>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="row">
                    @foreach(DB::table('posts')->where('success', '1')->get() as $row)
                        <div class="card">
                            <img class="card-img-top" src="{!! asset('images/schoolpic.jpg') !!}" alt="Card image" style="width:100% ; ">
                            <div class="card-body">
                                <h4 class="card-title"><b>School :
                                {{$row->schoolname}}</b></h4>
                                <p class="card-text"><p>Description : {{$row->description}}</p>
                                <p>Phone number :{{$row->phonenumber}}</p>
                                </p>
                                <!-- <a href="#" class="btn btn-primary" style="float: right;"><b>See more</b></a> -->
                            </div>
                        </div>
                    
                    @endforeach    
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>

           
        </div>
    </div>
    <br>

    <br>
    <!-- <script>
        function scrolldownwhencollaps() {
            setTimeout(function() {
                document.querySelector('#spanmore').scrollIntoView({
                    'behavior': "smooth",
                    "block": "start"
                })
            }, 280)
        }
    </script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
@endsection