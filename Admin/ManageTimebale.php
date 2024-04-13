

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Time Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="./dashboard.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto">
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="javascript:void(0)"></a>
        </li> -->
        
      </ul>
      
    </div>
  </div>
</nav>
<section>
        <div class="container">
        <div class="row mt-2">
        <div class="col-md-6 card">
             
             <div class="btn card-header text-white bg-success text-center">
    <a href="testtimetable.php" style="text-decoration: none;"><h4 style="color: white;">Add Time Table </h4></a>
</div>


            </div>
        <div class="col-md-6 card">
             <div class="btn  card-header text-white bg-success text-center ">
    <a href="updatetimetable.php" style="text-decoration: none;"><h4 style="color: white;">Update Time Table </h4></a>
</div>

        </div>
        </div>
        </div>
    </section>
<div class="container">
<div class="card mt-5">
        <div class="card-body">
  <h2 class="card-header text-center  title  mb-4">Time Table</h2>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-warning text-white btn-lg btn-block mt-4" data-toggle="modal" data-target="#myModal">
    Monday
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Monday's Time Table</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
  $conn = mysqli_connect('localhost','root','password','sis');
  
  $sql = "SELECT * FROM monday";
  $a=mysqli_query($conn,$sql);
  if(mysqli_num_rows($a))
  {
    echo "<table class='table table-hover' >";
      echo "<tr>";
       #
        echo "<th>Time</th>";
        echo "<th>Subject</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Teachers</th>";
      echo "</tr>";
    while($row = mysqli_fetch_array($a))
    {
      echo "<tr>";
       #
        echo "<td>".$row['Ttime']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['subjectcode']."</td>";
        echo "<td>".$row['teachers']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "No records in table.";
  }

?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>
  




<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary btn-lg btn-block mt-2" data-toggle="modal" data-target="#myModal1">
    Tuesday
  </button>
  

  <!-- The Modal -->
  <div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tuesday's Time Table </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
  $conn = mysqli_connect('localhost','root','password','sis');
  
  $sql = "SELECT * FROM tuesday";
  $b=mysqli_query($conn,$sql);
  if(mysqli_num_rows($b))
  {
    echo "<table class='table table-hover'    width: 100%;>";
      echo "<tr>";
       #
        echo "<th>Time</th>";
        echo "<th>Subject</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Teachers</th>";
      echo "</tr>";
    while($row = mysqli_fetch_array($b))
    {
      echo "<tr>";
       #
        echo "<td>".$row['Ttime']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['subjectcode']."</td>";
        echo "<td>".$row['teachers']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "No records in table.";
  }
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-success btn-lg btn-block mt-2" data-toggle="modal" data-target="#myModal2">
    Wednesday
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Wednesday's Time Table</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
  $conn = mysqli_connect('localhost','root','password','sis');
  
  $sql = "SELECT * FROM wednesday";
  $a=mysqli_query($conn,$sql);
  if(mysqli_num_rows($a))
  {
    echo "<table class='table table-hover'    width: 100%;>";
      echo "<tr>";
       #
        echo "<th>Time</th>";
        echo "<th>Subject</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Teachers</th>";
      echo "</tr>";
    while($row = mysqli_fetch_array($a))
    {
      echo "<tr>";
       #
        echo "<td>".$row['Ttime']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['subjectcode']."</td>";
        echo "<td>".$row['teachers']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "No records in table.";
  }
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>



  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-danger btn-lg btn-block mt-2" data-toggle="modal" data-target="#myModal3">
    Thursday
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Thursday's Time Table</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
  $conn = mysqli_connect('localhost','root','password','sis');
  
  $sql = "SELECT * FROM thursday";
  $a=mysqli_query($conn,$sql);
  if(mysqli_num_rows($a))
  {
    echo "<table  class='table table-hover'    width: 100%;>";
      echo "<tr>";
       #
        echo "<th>Time</th>";
        echo "<th>Subject</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Teachers</th>";
      echo "</tr>";
    while($row = mysqli_fetch_array($a))
    {
      echo "<tr>";
       #
        echo "<td>".$row['Ttime']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['subjectcode']."</td>";
        echo "<td>".$row['teachers']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "No records in table.";
  }
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-info btn-lg btn-block mt-2" data-toggle="modal" data-target="#myModal4">
    Friday
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal4">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Friday's Time Table</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
  $conn = mysqli_connect('localhost','root','password','sis');
  
  $sql = "SELECT * FROM friday";
  $a=mysqli_query($conn,$sql);
  if(mysqli_num_rows($a))
  {
    echo "<table class='table table-hover'    width: 100%;>";
      echo "<tr>";
       #
        echo "<th>Time</th>";
        echo "<th>Subject</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Teachers</th>";
      echo "</tr>";
    while($row = mysqli_fetch_array($a))
    {
      echo "<tr>";
       #
        echo "<td>".$row['Ttime']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['subjectcode']."</td>";
        echo "<td>".$row['teachers']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "No records in table.";
  }
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>


  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-dark btn-lg btn-block mt-2" data-toggle="modal" data-target="#myModal5">
    Saturday
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal5">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Saturday's Time Table</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <?php
  $conn = mysqli_connect('localhost','root','password','sis');
  
  $sql = "SELECT * FROM saturday";
  $a=mysqli_query($conn,$sql);
  if(mysqli_num_rows($a))
  {
    echo "<table class='table table-hover'    width: 100%;>";
      echo "<tr>";
       #
        echo "<th>Time</th>";
        echo "<th>Subject</th>";
        echo "<th>Subject Code</th>";
        echo "<th>Teachers</th>";
      echo "</tr>";
    while($row = mysqli_fetch_array($a))
    {
      echo "<tr>";
       #
        echo "<td>".$row['Ttime']."</td>";
        echo "<td>".$row['subject']."</td>";
        echo "<td>".$row['subjectcode']."</td>";
        echo "<td>".$row['teachers']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  }
  else
  {
    echo "No records in table.";
  }
?>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

<br>
<!-- <div>
<div class="btn btn-primary ">
    <a href="testtimetable.php" style="text-decoration: none;"><h4 style="color: white;">Add Time Table </h4></a>
</div>
<div class="btn btn-primary ">
    <a href="updatetimetable.php" style="text-decoration: none;"><h4 style="color: white;">Update Time Table </h4></a>
</div>
</div> -->
<!--<div class="btn btn-primary">
    <a href="updatetimetable.php" style="text-decoration: none;"><h4 style="color: white;">Update Time Table </h4></a>
</div>
--> 
</div>
</div>
</div>

</body>
</html>
