<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='http://code.jquery.com/jquery-latest.js'></script>
    <script src="{{asset ('upload/img/' . Session::get('picture'))}}" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/instructor.css') }}">
    <script src="{{ asset('asset/js/instructor.js') }}"></script>
  </head>
  <body>
    <div class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      <div class="heading">
        <img src="{{asset ('upload/img/' . Session::get('picture'))}}" alt="">
        <div class="info">
          <h3><a href="/instructor">{{Session::get('username')}}</a></h3>
          <p>{{Session::get('id')}}</p>
        </div>
      </div>
      <ul class="categories" style="margin-top: 60px;">
        <li></i><a href="/instructor/classes">&nbsp;&nbsp;Classes</a></li>
        <li></i><a href="/instructor/grades">&nbsp;&nbsp;Assign Grades</a></li>
        <li></i><a href="/forumposts">&nbsp;&nbsp;Discussion Forum</a></li>
        <li></i><a href="" class="down">&nbsp;&nbsp;Settings</a>
          <ul class="side-nav-dropdown">
            <li> &nbsp;<a href="/instructor/profilesettings">Profile Settings</a></li>
            <li> &nbsp;<a href="/instructor/security">Security</a></li>
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
                  <li><a href="/instructor/myaccount"><i class="fa fa-user-o fw"></i> My account</a></li>
                  <li><a href="/instructor/myinbox"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/login"><i class="fa fa-sign-out"></i> Log out</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div>
          <input type="text" class="search" id="search" onkeyup="search()" placeholder="Search using ID, Name or Email" style="width: 1135px; height: 40px; margin-left: 140px; margin-top: 30px; font-size: 20px; font-family: sans-serif;color: #004981; border: 2px solid gray; background: white; padding: 0 15px; font-weight: 500;">
      </div>
      <div class="container">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-6">
                        <h2>Student <b>List</b></h2>
                       </div>
                       <div class="col-sm-6">
                        <a href="/instructor/printstudentlist/{{$coursename}}/{{$section}}" class="btn btn-success" data-toggle="modal"><i class="material-icons">arrow_drop_down_circle</i> <span>print</span></a>
                      </div>
                  </div>
              </div>
              <table id="table" class="table table-striped table-hover">
                <thead>
                  <tr>
                          <th>Id</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>CGPA</th>
                    </tr>
                </thead>
                <tbody>
                  @for($i=0; $i != count($courselist); $i++)
                    <tr>
                      <td>{{$courselist[$i]->id}}</td>
                      <td>{{$courselist[$i]->name}}</td>
                      <td>{{$courselist[$i]->email}}</td>
                      <td>{{$courselist[$i]->cgpa}}</td>
                    </tr>
                  @endfor
                  </tbody>
              </table>
          </div>
      </div>
    </section>
  </body>
</html>
<script >

function search() {
  var input = document.getElementById("search");
  var filter = input.value.toUpperCase();
  var table = document.getElementById("table");
  var tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++){
    td1 = tr[i].getElementsByTagName("td")[0];
    td2 = tr[i].getElementsByTagName("td")[1];
    td3 = tr[i].getElementsByTagName("td")[2];
    if (td1 || td2) {
      var txtValue1 = td1.textContent || td1.innerText;
      var txtValue2 = td2.textContent || td2.innerText;
      var txtValue3 = td3.textContent || td3.innerText;
      if (txtValue1.toUpperCase().indexOf(filter) > -1 || (txtValue2.toUpperCase().indexOf(filter) > -1)|| (txtValue3.toUpperCase().indexOf(filter) > -1)) {
          tr[i].style.display = "";
      } else {
          tr[i].style.display = "none";
      }
    }
  }
}

$(document).ready(function(){

  $(".edit").on('click',function(){
      $tr = $(this).closest('tr');
      var editdata = $tr.children('td').map(function(){
        return $(this).text();
      }).get();

      console.log(editdata);
        $('#marks').val(editdata[2]);
        $('#grades').val(editdata[3]);

      $('#editform').attr('action','/instructor/coursefile/updatecourseforstudent/{{$coursename}}/{{$section}}/'+editdata[0]);
  });
});
</script>
