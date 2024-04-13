<?php 
  include_once './db.php';
    // initialize errors variable
    session_start();
    if(!isset($_SESSION['enrollment'])) {
      header("Location: ../index.html");
    }
	$errors = "";

	// connect to database
	$db = mysqli_connect("localhost", "root", "password", "sis");

	// insert a quote if submit button is clicked
	if (isset($_POST['submit'])) {
		if (empty($_POST['task'])) {
			$errors = "You must fill in the task";
		}else{
      $uid=  $_SESSION["enrollment"];
			$task = $_POST['task'];
			$sql = "INSERT INTO todo (uname,todo) VALUES ('$uid','$task')";
			mysqli_query($db, $sql);
			header('location: index.php');
		}
	}	
    if (isset($_GET['del_task'])) {
        $id = $_GET['del_task'];
    
        mysqli_query($db, "DELETE FROM todo WHERE id=".$id);
        header('location: index.php');
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
 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   

</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">SIS.</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          
          
          <li><a class="nav-link scrollto" href="#dashboard">Dashboard</a></li>
          <li><a class="nav-link scrollto" href="./timetable.php">TimeTable</a></li>
         
          
                  
                      <li class="nav-item dropdown">
                      <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <!-- <img src="./profile icon.png" width="50" height="50" class="rounded-circle"
                       style="border-color: black;box-shadow: 3px 3px 3px rgb(87, 87, 87); 
                       margin-top: 5px ; margin-right: 20px">
                        -->
                        <?php
                        $current_id = $_SESSION["enrollment"];
                      
                        $query_login = "SELECT * FROM students WHERE enrollment ='".$current_id."'";
                        $result_login = $conn->query($query_login) or die($conn->error);
                        
                        // if(!isset($_SESSION['loggedin'])) {
                        //     header("Location: ../index.php");
                        // }	
                        
                        while($row = $result_login->fetch_assoc()){
                            $image_profile = $row["photo"];
                          //  $name = $row["name"];
                        }
                                if($image_profile == null){
                                    echo '<img src="./profile icon.png" width="50" height="50" class="rounded-circle"
                                style="border-color: black;box-shadow: 3px 3px 3px rgb(87, 87, 87); margin-top: 5px ; margin-right: 20px">';
                                }else{
                                    echo '<img src="data:image;base64,'.base64_encode($image_profile).'" width="50" height="50" class="rounded-circle"
                                style="border-color: black;box-shadow: 3px 3px 3px rgb(87, 87, 87); margin-top: 5px ; margin-right: 20px">';
                                }
                            ?>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" style="border-color: black;box-shadow: 2px 2px 2px rgb(87, 87, 87); margin-top: 5px ; margin-right: 20px">
                        <a class="dropdown-item" href="./Profile/profile.php">Profile</a>
                      
                         <a class="dropdown-item" href="resetPassword.php">Reset password</a>
                        <a class="dropdown-item" href="./logout.php">Log Out</a>
                      </div>
                      </li>   
                 
        </ul>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
        
      </nav>
      
    </div>
  </header>

 
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <div class="heading">
		</div>
	<form method="post" action="index.php" class="input_form">
    <h2 style="font-style: 'Hervetica';">TODO</h2>

    <?php if (isset($errors)) { ?>
	<p><?php echo $errors; ?></p>
<?php } ?>
		<input type="text" name="task" class="task_input">
		<button type="submit" name="submit" id="add_btn" class="add_btn">Add Task</button>
	</form>
    <table>
	<thead>
		<tr>
			<th>SN.</th>
			<th>Tasks.</th>
			<th style="width: 60px;">Action.</th>
		</tr>
	</thead>

	<tbody>
		<?php 
     $uid=  $_SESSION["enrollment"];
		// select all tasks if page is visited or refreshed
		$tasks = mysqli_query($db, "SELECT id,todo FROM todo WHERE uname=$uid");

		$i = 1; while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['todo']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>">x</a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="../assets/img/todo.jpg" class="img-fluid animated" alt="">

        

        </div>
      </div>
    </div>

  </section>

  <main id="main">

    <section id="featured-services" class="featured-services">
      <div class="container">

      <div id="dashboard" class="section-title">
          <span>Dashboard</span>
          <h2>Dashboard</h2>
         
        </div>
        <div class="row">
         
        


         
        </div>

      </div>
    </section>
    
   
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <a href="./Assignment.php">  <div class="icon-box">
              <div class="icon"><i class="bi bi-book-half"></i></div>
              <h4 class="title"> View Assignment</h4>
             </div></a>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <a href="./QRScannerSecurity.php"> <div class="icon-box">
              <div class="icon"><i class="bi bi-qr-code-scan"></i></div>
              <h4 class="title">Scan QR</h4>
             </div></a>
          </div>
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <a href="./Notes.php"> <div class="icon-box">
              <div class="icon"><i class="bi bi-journals"></i></div>
              <h4 class="title">View Notes</h4>
             </div></a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <a href="../Teachers/quiz/account.php?q=1">  <div class="icon-box">
              <div class="icon"><i class="bi bi-journal-text"></i></div>
              <h4 class="title">Test</h4>
             </div></a>
          </div>
         
          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <a href="./Attendance.php"> <div class="icon-box">
              <div class="icon"><i class="bi bi-file-person"></i></div>
              <h4 class="title">View Attendance</h4>
             </div></a>
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