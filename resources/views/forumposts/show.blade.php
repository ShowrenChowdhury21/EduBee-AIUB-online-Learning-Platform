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
        <a href="/forumposts" class="btn btn-warning">back</a>
        <a href="/forumposts/{{$post->id}}/printshow" class="btn btn-warning">print</a>
        <h1 class="mt-4">{{$post->title}}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">{{$post->username}}</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{$post->created_at}}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="/storage/cover_images/{{$post->cover_image}}" alt="">

        <hr>

        <!-- Post Content -->
        <p class="lead">{!!$post->body!!}</p>

          <div class="">
            @if(Session::get('id')==$post->userid)

              {!!Form::open(['action'=>['forumController@destroy',$post->id],'method' => 'POST'])!!}
                  {{Form::hidden('_method','DELETE')}}
                  {{Form::submit('Delete',['class'=>'btn btn-danger right'])}}
              {!!Form::close()!!}
              <a href="/forumposts/{{$post->id}}/edit" class="btn btn-info right" style="margin-right:20px;">edit</a>
            @else
            <a href="/comments/{{$post->id}}/create" class="btn btn-info" style="float:right; margin-right:20px;">comment</a>
            @endif
          </div>
        <br>
        <br>
        <hr>
        <h2>Comments</h2>
        <hr>
        @if(count($reply)>0)
            @foreach($reply as $rel)
      <div class="">

        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">{!!$rel->replyUname!!} <small>on <i>{{$rel->created_at}}</i></small> </h5>
            {!!$rel->reply!!}
          </div>
        </div>
        <div class="">
          @if(Session::get('id') == $rel->replyUid)
            {!!Form::open(['action'=>['commentController@destroy', $rel->id],'method' => 'POST','class'=>'pull-right'])!!}
                {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-danger right'])}}
            {!!Form::close()!!}

          <a href="/comments/{{$rel->id}}/edit" class="btn btn-info right" style="margin-right:20px;">edit</a>
          @else
          <a href="/comments/{{$post->id}}/create" class="btn btn-info" style="float:right; margin-right:20px;">reply</a>
          @endif
        </div>


        </div>
        <br>
        <br>
        <hr>

        @endforeach
        @else
      <p>no comments</p>
      @endif



        <!-- Comment with nested comments
        <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0">Commenter Name</h5>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

            <div class="media mt-4">
              <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
              <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
              </div>
            </div>

          </div>
        </div>-->

      </div>

      <!-- Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 navback">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; EduBee 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="public/asset/customForum/vendor/jquery/jquery.min.js"></script>
  <script src="public/asset/customForum/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
