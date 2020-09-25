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
                        <h1 class="filetitle" style="margin-top:60px;">Student Name: {{$courselist[0]->name}}</h1>
                        <h1 class="filetitle" style="font-size: 15px;">CGPA: {{$courselist[0]->cgpa}}</h1>
                        <h2>Grades by<b> Semester</b></h2>
                       </div>
                  </div>
              </div>
              <table id="table" class="table table-striped table-hover">
                <thead>
                  <tr>
                          <th>Course name</th>
                          <th>Marks</th>
                          <th>Grades</th>
                    </tr>
                </thead>
                <tbody>
                  @for($i=0; $i != count($courselist); $i++)
                    <tr>
                      <td>{{$courselist[$i]->coursename}}</td>
                      <td>{{$courselist[$i]->marks}}</td>
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
