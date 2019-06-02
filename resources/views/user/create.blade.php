@extends('user.master')
@section('head')
@section('title','CreatePost')
<!-- <head>
  <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({selector:'textarea'});</script>
  
</head> -->
@section('content')
<div class="container">
    <div class="row">
        <div class= "col-md-12"><br><br>
            <h3 align = "center"> Add user </h3><br>

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
                <div class = "alert alert-success">
                    <p>{{ \Session::get('success')}}</p>
                </div>
            @endif

            <form method = "post" action="{{url('user')}}">
                {{csrf_field()}}
                <!-- <div class = "form-group">
                    <input type="text" name= "schoolname" class="form-control" placeholder="Firstname"/>
                </div> -->

                <div class = "form-group">
                    <input type="text" name= "schoolname" class="form-control" placeholder="School name or Topic"/>
                </div>
                
                    <div class="form-group">
                        <label for="comment">DESCRIPTION:</label>
                        <textarea name= "lname" class="form-control" rows="5" id="comment" value="type your info"></textarea>
                    </div>
                
                

                <br>
                <div class = "form-group">
                    <input type="submit" class="btn btn-primary" value="submit"/>
                </div>
                
            </form>
    
                <!-- test
                <div class="standalone-container">
                    <div id="snow-container"></div>
                </div>

  
  
                <script src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>

                <script src="../quill.min.js"></script>

                <script>
                    var quill = new Quill('#snow-container', {
                    placeholder: 'Compose an epic...',
                    theme: 'snow'
                    });
                </script> -->
        </div>
    </div>
</div>
@endsection