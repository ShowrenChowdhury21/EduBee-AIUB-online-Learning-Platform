<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EduBee Forum</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="{{ asset('asset/customForum/css/blog-home.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/customForum/vendor/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('asset/css/forum.css')}}">
  <!-- Custom styles for this template
  <link href="css/blog-home.css" rel="stylesheet"> -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


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

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Have an Issue? {{Session::get('username')}}
          <small><a class="btn btn-info" href="/forumposts/create"> <b>Post It!</b></a></small>
        </h1>

        <!-- Blog Post -->

        @include('forumposts.validationmessage')
          @if(count($posts)>0)
              @foreach($posts as $post)

                    <div class="card mb-4">
                      <!--<img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">-->
                      <div class="card-body border">
                        <div class="row">
                          <div class="col-md-4 col-sm-4">
                            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
                          </div>
                          <div class="col-md-8 col-sm-8">
                            <h2 class="card-title">{{$post->title}}</h2>
                            <p class="card-text"></p>
                            <a href="/forumposts/{{$post->id}}" class="btn btn-primary">Read More &rarr;</a>
                          </div>
                        </div>

                      </div>
                      <div class="card-footer text-muted">
                        Posted on {{$post->created_at}} by
                        <a href="#">{{$post->username}}</a>
                      </div>
                    </div>

          @endforeach
        @else
          <p>no post</p>
        @endif

        <ul class="pagination justify-content-center mb-4">
          {{$posts->links()}}
        </ul>
      </div>


      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" name="search" id="search" class="form-control" placeholder="Search for...">
            </div>
            <br>
            <hr>
            <table>
              <thead>
                <tr>
                  <th></th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>
        </div>

        <!-- Categories Widget -->


        <!-- Side Widget -->


      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="navback py-5">
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
<script>

$(document).ready(function(){

 fetch_post_data();

 function fetch_post_data(query = '')
 {
  $.ajax({
   url:"{{ route('forumController.search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);;
   }
  })
 }
 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_post_data(query);
 });
});

</script>
