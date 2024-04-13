<?php 
    // initialize errors variable
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "password", "sis");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
			$task = $_POST['task'];
			$sql = "INSERT INTO todo (uname,todo) VALUES ('Manoj','$task')";
			mysqli_query($db, $sql);
			header('location: classroom.php');
		}
	}	
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM todo WHERE id=".$id);
        header('location: classroom.php');
    }
    
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Student Information System</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/todo.css" rel="stylesheet">
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="./dashboard.php">SIS.</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          
          <li><a class="nav-link scrollto" href="./dashboard.php">Dashboard</a></li>
          
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

 
  <main id="main">

    <section id="featured-services" class="featured-services">
      <div class="container">

      <div id="dashboard" class="section-title">
          <span>Students List</span>
          <h2>Students List</h2>
         
        </div>
        <div class="row">
         
        
        <?php
include "db.php"; 
 
$message = "";
if (isset($_POST['submit'])) {
    $allowed = array('csv');
    $filename = $_FILES['file']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $message = 'Invalid file type or no file uploaded, please use .CSV file!';
    } else {
 
        move_uploaded_file($_FILES["file"]["tmp_name"], "" . $_FILES['file']['name']);
        $file = "" . $_FILES['file']['name'];
 
        $query = <<<eof
        LOAD DATA LOCAL INFILE '$file'
         INTO TABLE students
         FIELDS TERMINATED BY ','
         LINES TERMINATED BY '\n'

        (id,name,surname,email,enrollment,password,rank,level)
eof;
        if (!$result = mysqli_query($conn, $query)) {
            exit(mysqli_error($con));
        }
        $message = "CSV file successfully imported!";
    }
}
 
$users = '<table class="table table-bordered">
<tr>
    <th>ID</th>
    <th>name</th>
    <th>surname</th>
    <th>email</th>
    <th>enrollment</th>
    <th>password</th>
    <th>rank</th>
    <th>level</th>
    <th>supervisor</th>
    <th>second_supervisor</th>
    <th>modules</th>
</tr>
';

$query = "SELECT * FROM students";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        $users .= '<tr>
            <td>' . $number . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['enrollment'] . '</td>
            <td>' . $row['email'] . '</td>
            <td>' . $row['phone'] . '</td>
            <td>' . $row['password'] . '</td>
            <td>' . $row['sem'] . '</td>
        </tr>';
        $number++;
    }
} else {
    $users .= '<tr>
        <td colspan="4">Records not found!</td>
        </tr>';
}
$users .= '</table>';
?>




    
   
   
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  
  

<div class="container">
    <div class="row">
       
    	<h1>List Of Teachers</h1>
    	<hr>
            <div class="row">
        <div class="col-md-6 col-md-offset-0">
           
        </div>
    </div>
        <div class="panel panel-primary filterable" style="border-color: #00bdaa;">
            <div class="panel-heading" style="background-color: #ff6200">
              
                <div class="float-right" >
                    <button class="btn btn-success btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter Search</button>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Teacher ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Phone" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Qualification" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Designation" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Experience" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Edit/Delete" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $output = '';
                        if(isset($_POST["query"]))
                        {
                         $search = mysqli_real_escape_string($conn, $_POST["query"]);
                         $query = "
                          SELECT * FROM teachers
                          WHERE name LIKE '%".$search."%'
                          OR surname LIKE '%".$search."%' 
                          OR email LIKE '%".$search."%' 
                          OR enrollment LIKE '%".$search."%' 
                         ";
                        }
                        else
                        {
                         $query = "SELECT * FROM teachers ORDER BY name asc";
                        }
                            $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0)
                        {

                         while($row = mysqli_fetch_array($result))
                         {
                        $enrollment = $row["teacherid"];
                            
                          $output .= '
                           <tr>
                            <td>'.$row["name"].'</td>
                            <td>'.$row["teacherid"].'</td>
                            <td>'.$row["email"].'</td>
                            <td>'.$row["phone"].'</td>
                            <td>'.$row["qualification"].'</td>
                            
                            <td>'.$row["designation"].'</td>
                            <td>'.$row["experience"].'</td>

                          <td class="text-center">
                          <a class="btn-edit btn btn-info btn-xs" href="edit-teacher.php?id=' . $enrollment . '">
                          <span class=" glyphicon glyphicon-edit"></span> Edit</a>
                           <a href="remove-teacher.php?id=' . $enrollment . '"class="btn-remove btn btn-danger btn-xs">
                           <span class="glyphicon glyphicon-remove"></span>Delete</a></td>
                           </tr>
                        </div>
                          ';
                         }
                         echo $output;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<style type="text/css">
    .filterable {
    margin-top: 15px;
    }
    .filterable .panel-heading .pull-right {
        margin-top: -20px;
    }
    .filterable .filters input[disabled] {
        background-color: transparent;
        border: none;
        cursor: auto;
        box-shadow: none;
        padding: 0;
        height: auto;
    }
    .filterable .filters input[disabled]::-webkit-input-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]::-moz-placeholder {
        color: #333;
    }
    .filterable .filters input[disabled]:-ms-input-placeholder {
        color: #333;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e){
            var code = e.keyCode || e.which;
            if (code == '9') return;
            
            var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');

            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });

            $table.find('tbody .no-result').remove();

            $rows.show();
            $filteredRows.hide();

            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });
</script>



         
        </div>

      </div>
    </section>
    
   
<hr>
  </main>

  <footer id="footer">

    <div class="footer-top">

    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Student Information System</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">SIS TEAM</a>
      </div>
    </div>
  </footer>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>