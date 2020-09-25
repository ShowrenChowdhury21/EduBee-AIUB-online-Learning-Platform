<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EduBee Forum</title>

  <link rel="stylesheet" href="{{ asset('asset/customForum/css/blog-home.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/customForum/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/css/forum.css')}}">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navback">
    <div class="container">
      <a class="navbar-brand" href="#">EduBee Forum</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/forumpost/dashboard">Dashboard
              <span class="sr-only">(current)</span>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <br>
        <a href="/forumposts" class="btn btn-danger">cancle</a>
        <h1 class="mt-4">comments on {{$post->title}}</h1>

        @include('forumposts.validationmessage')
        {!! Form::open(['action'=>'commentController@store','method'=>'POST']) !!}
            @include('forumposts.validationmessage')
            <div class="form-group">
              {{Form::label('reply','comments:')}}
              {{Form::textarea('reply','',['id' => 'summary-ckeditor','class'=>'form-control','placeholder'=>'write your comment'])}}
            </div>
            {{Form::hidden('replyUid',Session::get('id'))}}
            {{Form::hidden('replyUname',Session::get('username'))}}
            {{Form::hidden('postid',$post->id)}}
            {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        {!! Form::close() !!}
    </div>
    <!-- /.row -->

  </div>
  <br>
</div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 navback">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; EduBee 2020</p>
    </div>
    <!-- /.container -->
  </footer>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="public/asset/customForum/vendor/jquery/jquery.min.js"></script>
  <script src="public/asset/customForum/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
  <script>
  CKEDITOR.replace( 'summary-ckeditor' );
  </script>
</body>

</html>
