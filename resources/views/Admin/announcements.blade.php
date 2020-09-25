<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Announcements</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src='http://code.jquery.com/jquery-latest.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/crud.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/css/admin.css') }}">
  <script src="{{ asset('asset/js/admin.js') }}"></script>
</head>

<body>
  <div class="side-nav" id="show-side-navigation1">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
    <div class="heading">
      <img src="{{asset ('upload/img/' . Session::get('picture'))}}" alt="">
      <div class="info">
        <h3><a href="/admin">{{Session::get('username')}}</a></h3>
        <p>{{Session::get('id')}}</p>
      </div>
    </div>
    <ul class="categories" style="margin-top: 60px;">
      <li></i><a href="/admin/moderatormanagement">&nbsp;&nbsp;Moderator Management</a></li>
      <li></i><a href="/admin/usermanagement">&nbsp;&nbsp;User Management</a></li>
      <li></i><a href="/admin/coursemanagement">&nbsp;&nbsp;Course Management</a></li>
      <li></i><a href="" class="down">&nbsp;&nbsp;Allocations</a>
        <ul class="side-nav-dropdown">
          <li> &nbsp;<a href="/admin/courseforstudent">Student's void</a></li>
          <li> &nbsp;<a href="/admin/instructorallocation">Intructor Allocation</a></li>
        </ul>
      </li>
      <li></i><a href="/admin/announcements">&nbsp;&nbsp;Announcements</a></li>
      <li></i><a href="/forumposts">&nbsp;&nbsp;Discussion Forum</a></li>
      <li></i><a href="" class="down">&nbsp;&nbsp;Settings</a>
        <ul class="side-nav-dropdown">
          <li> &nbsp;<a href="/admin/profilesettings">Profile Settings</a></li>
          <li> &nbsp;<a href="/admin/security">Security</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <section id="contents">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <i class="fa fa-align-right"></i>
          </button>
          <a class="navbar-brand"><span class="main-color">Dashboard</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/myaccount"><i class="fa fa-user-o fw"></i> My account</a></li>
                <li><a href="/admin/myinbox"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/login"><i class="fa fa-sign-out"></i> Log out</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments"></i><span>22</span></a>
              <ul class="dropdown-menu" style="margin-left: -150px;width: 200px;">
                <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;">Showren</span><br><span class="notify">Hi. how r u?</span></a></li>
                <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;">Sajid</span><br><span class="notify"> Hi. how r u?</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="announcements">
      <h1>Announcements</h1>
      <form method="post" action="/forum/announcements">
        <div class="announcementsform">
          <label>Title</label>
          <input type="text" class="title" name='title' required>
        </div>
        <div class="announcementsform">
          <label>Details</label>
          <textarea class="details" name='details' required></textarea>
        </div>
        <input type="submit" class="publish" value="Publish">
      </form>
    </div>
  </section>
</body>

</html>
