<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Bootstrap core CSS -->
  <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Assets/css/blog-post.css" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src='../Assets/superadmin.js'></script>
  <link rel="stylesheet" href="../Assets/crud.css">
  <link rel="stylesheet" href="../Assets/superadmin.css">
  <script src="https://cdn.tiny.cloud/1/pdhmry23yvf34bwdbz9gfe1y42fdlgfp20jzskyyla0mvd7u/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>


  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">EduBEE Forum
          <a href="/forumposts" class="btn btn-primary">back</a>

          <a class="btn btn-primary" href="/login"> Logout</a>

        </h1>
        @include('forumposts.validationmessage')
        {!! Form::open(['action'=>'commentReplyController@store','method'=>'POST']) !!}
            @include('forumposts.validationmessage')
            <div class="form-group">
              {{Form::label('commentReply','comments:')}}
              {{Form::textarea('commentReply','',['id' => 'summary-ckeditor','class'=>'form-control','placeholder'=>'write your reply'])}}
            </div>
            {{Form::hidden('commentreplyUid',Session::get('id'))}}
            {{Form::hidden('commenreplyUname',Session::get('username'))}}
            {{Form::hidden('commentid',$reply->id)}}
            {{Form::hidden('mothercommentid',$reply->postid)}}
            {{Form::submit('Submit',['class'=>'btn btn-success'])}}
        {!! Form::close() !!}

      </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->

    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; EduBee 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
</body>

</html>
