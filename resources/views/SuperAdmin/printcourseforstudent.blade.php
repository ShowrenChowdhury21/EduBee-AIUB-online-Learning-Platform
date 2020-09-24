<html lang="en">
  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
  }
  </style>
  <head>
  </head>
  <body>
    <section id="contents">
      <table>
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Cgpa</th>
            <th>Course Id</th>
            <th>Course Name</th>
            <th>Section</th>
          </tr>
          </thead>
          <tbody>
            @for($i=0; $i != count($crsforstdnt); $i++)
            <tr>
              <td>{{$crsforstdnt[$i]->id}}</td>
              <td>{{$crsforstdnt[$i]->name}}</td>
              <td>{{$crsforstdnt[$i]->email}}</td>
              <td>{{$crsforstdnt[$i]->cgpa}}</td>
              <td>{{$crsforstdnt[$i]->courseid}}</td>
              <td>{{$crsforstdnt[$i]->coursename}}</td>
              <td>{{$crsforstdnt[$i]->section}}</td>
            </tr>
            @endfor
         </tbody>
</section>
  </body>
</html>
