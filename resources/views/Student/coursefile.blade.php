<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Files</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='http://code.jquery.com/jquery-latest.js'></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('asset/css/student.css') }}">
  <script src="{{ asset('asset/js/student.js') }}"></script>
</head>

<body>
  <div class="side-nav" id="show-side-navigation1">
    <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
    <div class="heading">
      <img src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
      <div class="info">
        <h3><a href="/student">{{Session::get('username')}}</a></h3>
        <p>{{Session::get('id')}}</p>
      </div>
    </div>
    <ul class="categories" style="margin-top: 60px;">
      <li><i class="fa fa-support fa-fw"></i><a href="/student/mycourse">&nbsp;&nbsp;My Courses</a></li>
      <li><i class="fa fa-bolt fa-fw"></i><a href="/student/mygrades">&nbsp;&nbsp;My Grades</a></li>
      <li><i class="fa fa-wrench fa-fw"></i><a href="#" class="down">&nbsp;&nbsp;Settings</a>
        <ul class="side-nav-dropdown">
          <li> &nbsp;<a href="/student/profilesettings">Profile Settings</a></li>
          <li> &nbsp;<a href="/student/security">Security</a></li>
        </ul>
      </li>
      <li><i class="fa fa-window-restore" aria-hidden="true">&nbsp;&nbsp;</i><a href="#" class="down">Help</a>
        <ul class="side-nav-dropdown">
          <li> &nbsp;<a href="/forum/post">Discussion Forum</a></li>
          <li> &nbsp;<a href="/student/consultation">Consultation</a></li>
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
          <a class="navbar-brand" href="#">Student<span class="main-color">Dashboard</span></a>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My profile <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/student/myaccount"><i class="fa fa-user-o fw"></i> My account</a></li>
                <li><a href="/student/myinbox"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/login"><i class="fa fa-sign-out"></i> Log out</a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments"></i><span>22</span></a>
              <ul class="dropdown-menu" style="margin-left: -150px;width: 200px;">
                <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;"><%= uname %></span><br><span class="notify">Hi. how r u?</span></a></li>
                <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;">Sajid</span><br><span class="notify"> Hi. how r u?</span></a></li>
              </ul>
            </li>
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell-o"></i><span>98</span></a>
              <ul class="dropdown-menu" style="margin-left: -200px;width: 250px;">
                <li><a href="#" class="notifymsg"><span class="notify" style="font-size: 20px;" maxlength="15">Advance Programming on Web Technology</span><br><span class="notify">Course video uploaded</span></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div id="main">
      <div id="course">
      <h1 class="filetitle" style="margin-top:60px;">Course Name: {{$coursename}}</h1>
      <h1 class="filetitle" style="font-size: 20px;">Faculty Name: {{$faculty[0]}}</h1>
        <h1 class="filetitle" style="font-size: 20px;">Section: {{$section}}</h1>
        <div class="fileContainer">
          <div class="buttonContainer">
            <button class="filebutton" onclick="fileshowpanel(0,'#004981')">Notes</button>
            <button class="filebutton" onclick="fileshowpanel(1,'#004981')">Videos</button>
            <button class="filebutton" onclick="fileshowpanel(2,'#004981')">Assignments</button>
          </div>
          <div class="filePanel">
            @foreach ($notelist as $nl)
              <a href='storage/uploads/{{$nl->filename}}'style="font-size: 20px; margin-left: -700px; text-align: left;" download>{{$nl->filename}}</a><br>
            @endforeach
          </div>
          <div class="filePanel">
            <div id="light">
              <a class="boxclose" id="boxclose" onclick="videoclose();"></a>
                @foreach ($videolist as $vl)
                <video id="videocard" width="600" controls>
                   <source src='{{url('storage/uploads/'.$vl->filename)}}' type="video/mp4">
                </video>
                @endforeach
            </div>
            <div id="fade" onClick="videoclose();"></div>
            <div>
              @foreach ($videolist as $vl)
                <a href='#' onclick="videoopen();" style="font-size: 20px; margin-left: -700px; text-align: left;">{{$vl->filename}}</a><br>
              @endforeach
            </div>
          </div>
          <div class="filePanel">
            @foreach ($assignmentlist as $al)
              <a href='storage/uploads/{{$al->filename}}' style="font-size: 20px; margin-left: -700px; text-align: left;" download>{{$al->filename}}</a><br>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>

<script>
  var btns = document.querySelectorAll(".fileContainer .buttonContainer button");
  var filePanel = document.querySelectorAll(".fileContainer  .filePanel");

  function fileshowpanel(panelIndex, colorCode) {
    btns.forEach(function(node) {
      node.style.backgroundColor = "";
      node.style.color = "";
    });

    btns[panelIndex].style.backgroundColor = colorCode;
    btns[panelIndex].style.color = "white";

    filePanel.forEach(function(node) {
      node.style.display = "none";
    });
    filePanel[panelIndex].style.display = "block";
    filePanel[panelIndex].style.backgroundColor = white;
  }
  fileshowpanel(0, '#004981');


window.document.onkeydown = function(e) {
  if (!e) {
    e = event;
  }
  if (e.keyCode == 27) {
    videoclose();
  }
}
function videoopen() {
  var videobox = document.getElementById("videocard");
  window.scrollTo(0, 0);
  document.getElementById('light').style.display = 'block';
  document.getElementById('fade').style.display = 'block';
  videobox.play();
}
function videoclose() {
  var videobox = document.getElementById("videocard");
  document.getElementById('light').style.display = 'none';
  document.getElementById('fade').style.display = 'none';
  videobox.pause();
}
</script>>
