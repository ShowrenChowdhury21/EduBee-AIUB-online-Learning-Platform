<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Student's course Allocation</title>
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
      <img src="https://uniim1.shutterfly.com/ng/services/mediarender/THISLIFE/021036514417/media/23148907008/medium/1501685726/enhance" alt="">
      <div class="info">
        <h3><a href="/admin">Showren Chowdhury</a></h3>
        <p>17-*****-2</p>
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
    <div class="container">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <h2>Allocate <b>Courses</b></h2>
            </div>
            <div class="col-sm-6">
              <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Allocate</span></a>
            </div>
          </div>
        </div>
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th>Id</th>
              <th>Name</th>
              <th>Course Id</th>
              <th>Course Name</th>
              <th>Section</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>17-33335-2</td>
              <td>Sajid</td>
              <td>CS101</td>
              <td>Advance Programming in web Technology</td>
              <td>A</td>
              <td>
                <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div id="addEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">New Allocation</h4>
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
                <label>Course Id</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Course Name</label>
                <textarea class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Section</label>
                <input type="text" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-success" value="Add">
            </div>
          </form>
        </div>
      </div>
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
                <label>Course Id</label>
                <input type="email" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Course Name</label>
                <textarea class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Section</label>
                <input type="text" class="form-control" required>
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

    <div id="deleteEmployeeModal" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">
              <h4 class="modal-title">Delete Allocation</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete these Records?</p>
              <p class="text-warning"><small>This action cannot be undone.</small></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
              <input type="submit" class="btn btn-danger" value="Delete">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</body>

</html>
