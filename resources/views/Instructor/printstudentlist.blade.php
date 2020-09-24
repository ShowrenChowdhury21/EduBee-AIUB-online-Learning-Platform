<html lang="en">
  <head>
  </head>
  <body>
    <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    </style>
    <section id="contents">
      <div class="container" style="margin-left:200px">
          <div class="table-wrapper">
              <div class="table-title">
                  <div class="row">
                      <div class="col-sm-6">
                        <h1 class="filetitle" style="margin-top:60px;">Course Name: {{$coursename}}</h1>
                        <h1 class="filetitle" style="font-size: 15px;">Section: {{$section}}</h1>
                        <h2>Student <b>List</b></h2>
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
                      <!-- <td></td> -->
                      <td>{{$courselist[$i]->name}}</td>
                      <td>{{$courselist[$i]->email}}</td>
                      <td>{{$courselist[$i]->grades}}</td>
                    </tr>
                  @endfor
                  </tbody>
              </table>
          </div>
      </div>
    </section>
  </body>
</html>
