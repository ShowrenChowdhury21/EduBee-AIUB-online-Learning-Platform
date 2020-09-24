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
    <table>
      <thead>
        <tr>
          <th>Instructor Id</th>
          <th>Instructor Name</th>
          <th>Course Id</th>
          <th>Course Name</th>
          <th>Section</th>
        </tr>
      </thead>
      <tbody>
        @for($i=0; $i != count($instructor); $i++)
        <tr>
          <td>{{$instructor[$i]->id}}</td>
          <td>{{$instructor[$i]->name}}</td>
          <td>{{$instructor[$i]->courseid}}</td>
          <td>{{$instructor[$i]->coursename}}</td>
          <td>{{$instructor[$i]->section}}</td>
        </tr>
        @endfor
      </tbody>
    </table>
  </body>
</html>
