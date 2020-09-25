<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <br>

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

      </div>

      <!-- Sidebar Widgets Column -->


    </div>
    <!-- /.row -->

  </div>

</body>

</html>
