<?php  


include_once 'db.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Students Result</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
</head>
<body>



<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./../Teachers/quiz/account.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="javascript:void(0)">Result</a>
        </li> -->
        
      </ul>
      
    </div>
  </div>
</nav>
<!-- Student Result Start here -->
<section>
<div class="container mt-5">
  <div class="row">
    <div class="card">
      <div class="card-header mt-2 text-center text-white bg-success">
        <h1 >Your Results </h1>
      </div>
      <input type="text" class="form-control  " id="myInput" onkeyup="myFunction()" placeholder="Search Result by Enrollment" >
      <table id="myTable" class="table table-striped table-hover">
      <thead class="bg-dark text-white">
      <tr>
        <th scope="col">Enrollment</th>
        <th scope="col">Test Title</th>
        <th scope="col">Student Name</th>
        <th scope="col">Time</th>
        <th scope="col">Score</th>
      </tr>
    </thead>
    <tbody>
        <?php 
        //$eid=$_GET['id'];
    $query = $conn->query("SELECT s.*, h.* FROM history as h INNER JOIN students as s ON s.email= h.email where h.eid = '$eid' ORDER BY date ");
    if(mysqli_num_rows($query) == 0){
        echo '<tr>';
        echo '<td></td>';
        echo '<td></td>';
        echo '<td>None of Students attempted quiz</td>';
        echo '<td></td>';
        echo '<td></td>';
        echo '</tr>';
       }else{
        while ($row = mysqli_fetch_assoc($query)) {
            // $query1 = $conn->query("SELECT name FROM teachers Where teacherid = '$row[teacherid]' ");
            // $name_t = "";
            // while ($row_data = mysqli_fetch_assoc($query1)) {
            //     $name_t = $row_data['name'];
            // }

            $date = new DateTime($row['date']);
            
            echo '<tr>';
              echo '<td>'.$row['enrollment'].'</td>';
              echo '<td>'.$_GET['title'].'</td>';
              echo '<td>'.$row['name'].'</td>';
              echo '<td>'.$row['date'].'</td>';
              echo '<td>'.$row['score'].'</td>';

      echo '</tr>';
        }
    }
        ?>
  </tbody>
      </table>
    </div>
  </div>
</div>
</section>
<!-- Student Result End here -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>
</html>
