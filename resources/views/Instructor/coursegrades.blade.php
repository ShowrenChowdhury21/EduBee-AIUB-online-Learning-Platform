<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Grades</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='http://code.jquery.com/jquery-latest.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/instructor.css') }}">
    <script src="{{ asset('asset/js/instructor.js') }}"></script>
  </head>
  <body>
    <div class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      <div class="heading">
        <img src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
        <div class="info">
          <h3><a href="/instructor"><%= uname %></a></h3>
        </div>
      </div>
      <ul class="categories" style="margin-top: 60px;">
        <li></i><a href="/instructor/classes">&nbsp;&nbsp;Classes</a></li>
        <li></i><a href="/instructor/grades">&nbsp;&nbsp;Assign Grades</a></li>
        <li></i><a href="/forum/post">&nbsp;&nbsp;Discussion Forum</a></li>
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
              <li>
                <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-comments"></i><span>22</span></a>
                  <ul class="dropdown-menu" style="margin-left: -150px;width: 200px;">
                    <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;">Showren</span><br><span class="notify">Hi. how r u?</span></a></li>
                      <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;">Sajid</span><br><span class="notify"> Hi. how r u?</span></a></li>
                  </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div id="main">
        <div id="mygrades">
          <h1 class="gradetitle">Course Grades</h1>
          <hr style="width: 100%; border-top: 2px solid #005aa2;">
        </div>
      </div>
      <div>
          <input type="text" class="search" id="search" onkeyup="search()" placeholder="Search using ID, Name or Email" style="width: 1135px; height: 40px; margin-left: 140px; margin-top: 30px; font-size: 20px; font-family: sans-serif;color: #004981; border: 2px solid gray; background: white; padding: 0 15px; font-weight: 500;">
      </div>
      <div class="container">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-6">
                        <h2>Manage <b>User</b></h2>
                       </div>
                  </div>
              </div>
              <table id="table" class="table table-striped table-hover">
                <thead>
                  <tr>
                          <th>StudentId</th>
                          <th>Student Name</th>
                          <th>Total Marks</th>
                          <th>grade</th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>11121</td>
                      <td>Sajid</td>
                      <td>92</td>
                      <td>A+</td>
                      <td>
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                      </td>
                    </tr>
                  </tbody>
              </table>
          </div>
          <div id="editEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h4 class="modal-title">Edit Allocation</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Id</label>
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Name</label>
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Total Marks</label>
                      <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Grade</label>
                      <textarea class="form-control" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                  </div>
                </form>
              </div>
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
</script>
