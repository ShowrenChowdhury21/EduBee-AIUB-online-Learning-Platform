<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Admin Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src='http://code.jquery.com/jquery-latest.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('asset/css/crud.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/superadmin.css') }}">
    <script src="{{ asset('asset/js/superadmin.js') }}"></script>
  </head>
  <body>
    <div class="side-nav" id="show-side-navigation1">
      <i class="fa fa-bars close-aside hidden-sm hidden-md hidden-lg" data-close="show-side-navigation1"></i>
      <div class="heading">
        <div class="info">
          <h3><a href="/superadmin">{{Session::get('username')}}</a></h3>
          <p>{{Session::get('id')}}</p>
        </div>
      </div>
      <ul class="categories" style="margin-top: 60px;">
        <li><a href="/superadmin/adminmanagement">&nbsp;&nbsp;Admin Management</a></li>
        <li></i><a href="/superadmin/moderatormanagement">&nbsp;&nbsp;Moderator Management</a></li>
        <li></i><a href="/superadmin/usermanagement">&nbsp;&nbsp;User Management</a></li>
        <li></i><a href="/superadmin/departmentmanagement">&nbsp;&nbsp;Department Management</a></li>
        <li></i><a href="/superadmin/coursemanagement">&nbsp;&nbsp;Course Management</a></li>
        <li></i><a href="" class="down">&nbsp;&nbsp;Allocations</a>
          <ul class="side-nav-dropdown">
            <li> &nbsp;<a href="/superadmin/courseforstudent">Student's void</a></li>
            <li> &nbsp;<a href="/superadmin/instructorallocation">Intructor Allocation</a></li>
          </ul>
        </li>
        <li></i><a href="/superadmin/announcements">&nbsp;&nbsp;Announcements</a></li>
        <li></i><a href="/forumposts">&nbsp;&nbsp;Discussion Forum</a></li>
        <li></i><a href="" class="down">&nbsp;&nbsp;Settings</a>
          <ul class="side-nav-dropdown">
            <li> &nbsp;<a href="/superadmin/profilesettings">Profile Settings</a></li>
            <li> &nbsp;<a href="/superadmin/security">Security</a></li>
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
                  <li><a href="/superadmin/myaccount"><i class="fa fa-user-o fw"></i> My account</a></li>
                  <li><a href="/superadmin/myinbox"><i class="fa fa-envelope-o fw"></i> My inbox</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="/login"><i class="fa fa-sign-out"></i> Log out</a></li>
                </ul>
              </li>
              <li>
                <a href="#"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" ><i class="fa fa-comments"></i><span>22</span></a>
                  <ul class="dropdown-menu" style="margin-left: -150px;width: 200px;">
                    <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;"><%= uname %></span><br><span class="notify">Hi. how r u?</span></a></li>
                      <li><a href="#" class="inboxmsg" class="notify"><span style="font-size: 20px;">Sajid</span><br><span class="notify"> Hi. how r u?</span></a></li>
                  </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

                  <div id="main">
                    <div id="myinbox">
                        <div class="container">
                          <div class="table-wrapper">
                              <div class="table-title">
                                  <div class="row">
                                      <div class="col-sm-6">
                                        <h2>My <b>Inbox</b></h2>
                                       </div>
                                       <div class="col-sm-6">
                                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Compose</span></a>
                                       </div>
                                  </div>
                              </div>
                              <table id = "table" class="table table-striped table-hover">
                                 <thead>


                                  <tr>
                                          <th>From</th>
                                          <th>Subject</th>
                                          <th>Email Body</th>
                                          <th>Actions</th>
                                  </tr>
                                  </thead>
                                  <tbody id="tablebody">
                                    @if(count($recvmail)>0)
                                      @foreach($recvmail as $rv)
                                        @if($rv->receiver_email == Session::get('email'))
                                        <tr>

                                          <td>{{$rv->sender_email}}</td>
                                          <td>{{$rv->subject}}</td>
                                          <td style="display: block; white-space: nowrap; width: 450px; height: 50px; overflow: hidden">{{$rv->email_body}}</td>
                                          <td>
                                            <a href = "#readmodal" class="read" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Read"></i>Read</a>
                                            <a href = "#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>Reply</a>
                                            <a href = "#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                          </td>
                                        </tr>
                                        @else
                                        @endif
                                        @endforeach
                                      @else
                                    @endif

                                  </tbody>
                              </table>
                          </div>
                      </div>
                    </div>
                  </div>

            <!-- compose-->
                   <div id="addEmployeeModal" class="modal fade">

                    <div class="modal-dialog">
                     <div class="modal-content">
                      <form action = "/superadmin/myinbox/storemail" method = "post">
                       <div class="modal-header">
                        <h4 class="modal-title">Compose Email</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                         <div class="form-group">
                          <label>To</label>
                          <select class="form-control" name="to" >
                            <option value="" selected>Select Reciever</option>
                            @foreach ($users as $user)
                            <option value="{{$user->email}}">{{$user->email}}</option>
                            @endforeach
                          </select>
                         </div>
                        <div class="form-group">
                         <label>Subject</label>
                         <input type="text" name = "subject" class="form-control" >
                        </div>
                        <div class="form-group">
                         <label>Message Body</label>
                         <textarea name = "email_body" class="form-control"  rows="8" cols="50" ></textarea>
                        </div>
                       </div>
                       <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel" >
                        <input type="submit" class="btn btn-success" value="Send Email" >
                       </div>
                      </form>
                     </div>
                    </div>

                   </div>
            <!-- compose-->
                   <div id="readmodal" class="modal fade">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <form action = "/superadmin/myinbox/reademail" method = "post" id="editform">
                       <div class="modal-header">
                        <h4 class="modal-title">Email Recieved</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                        <div class="form-group">
                          <label>From</label>
                          <input type="text" name = "from" id="from" class="form-control" >
                         </div>
                        <div class="form-group">
                         <label>Message Body</label>
                         <textarea name = "emailbody" class="form-control" id="emailbody"  rows="8" cols="50" ></textarea>
                        </div>
                       </div>
                       <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Ok">
                       </div>
                      </form>
                     </div>
                    </div>
                   </div>
            <!-- edit-->

                   <div id="editEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <form action = "/superadmin/myinbox/storereply" method = "post" id="editform">
                       <div class="modal-header">
                        <h4 class="modal-title">Reply Email</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                        <div class="form-group">
                          <label>Reply To</label>
                          <input type="text" name = "to" id="to" class="form-control" >
                         </div>
                         <div class="form-group">
                          <label>Subject</label>
                          <input type="text" name = "subject" class="form-control" >
                         </div>
                        <div class="form-group">
                         <label>Message Body</label>
                         <textarea name = "email_body" class="form-control"  rows="8" cols="50" ></textarea>
                        </div>
                       </div>
                       <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Reply">
                       </div>
                      </form>
                     </div>
                    </div>
                   </div>
            <!-- edit-->
                   <div id="deleteEmployeeModal" class="modal fade">
                    <div class="modal-dialog">
                     <div class="modal-content">
                      <form action="/superadmin/myinbox/deletemail" method="post" id="deleteform">
                       <div class="modal-header">
                        <h4 class="modal-title">Delete Email</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                       </div>
                       <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                       </div>
                       <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="submit" id="delete_button" class="btn btn-danger" value="Delete">Delete</button>
                       </div>
                      </form>
                     </div>
                    </div>
                  </div>


                </section>
              </body>
            </html>
            <script>


              $(document).ready(function(){
              $(".edit").on('click',function(){
                $tr = $(this).closest('tr');
                var editdata = $tr.children('td').map(function(){
                  return $(this).text();
                }).get();
                console.log(editdata);
                $('#to').val(editdata[0]);
                $('#editform').attr('action','/superadmin/myinbox/replyemail/'+editdata[0]);
              });
              $(".delete").on('click',function(){
                $tr = $(this).closest('tr');
                var editdata = $tr.children('td').map(function(){
                  return $(this).text();
                }).get();
                console.log(editdata);
                $('#to').val(editdata[2]);
                $('#deleteform').attr('action','/superadmin/myinbox/deleteemail/'+editdata[2]);
              });
              $(".read").on('click',function(){
                $tr = $(this).closest('tr');
                var editdata = $tr.children('td').map(function(){
                  return $(this).text();
                }).get();
                console.log(editdata);
                $('#from').val(editdata[0]);
                $('#emailbody').val(editdata[2]);
              });
              });
            </script>

          </ul>
        </div>
      </div>
    </nav>
    <form>
      <div id="main">

      </div>
    </form>
  </section>
</body>

</html>
