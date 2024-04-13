<?php 


session_start();
if(!isset($_SESSION['enrollment'])) {
  header("Location: ../index.html");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="stylee.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container1">
		<div class="heading">
			<span class="heading"></span>
			
	 	</div>
		<div class="db">
			<ul>
				<li>
					<a href="#">
						<span class="icon"></span>
				                <span class="material-icons">grid_view</span>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="./viewTeacher.php">
						<span class="icon"></span>
						<span class="material-icons">people</span>
						<span class="title">Manage Teachers</span>
					</a>
				</li>
				<li>
					<a href="./view-users.php">
						<span class="icon"></span>
						<span class="material-icons">group</span>
						<span class="title">Manage Students</span>
					</a>
				</li>

        <li>
					<a href="./ManageTimebale.php">
						<span class="icon"></span>
						<span class="material-icons">analytics</span>
						<span class="title">Manage TimeTable</span>
					</a>
				</li>
				<li>
					<a href="./analytics.php">
						<span class="icon"></span>
						<span class="material-icons">analytics</span>
						<span class="title">View Statistics</span>
					</a>
				</li>
				 <li>
                <a href="./resetPassword.php">
                    <span class="icon"></span>
                    <span class="material-icons">lock_reset</span>
                    <span class="title">Change Password</span>
                </a>
            </li>

				<li>
					<a href="./logout.php">
						<span class="icon"></span>
						<span class="material-icons">logout</span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>

		<div class="main">
		 	<div class="topbar">
				<div class="menu">
					<span class="material-icons">menu</span>	
				</div>
				
			</div>
            <?php
  include "db.php"; 
  

  

$query=mysqli_query($conn,"SELECT count( * ) as name FROM `students` ");
while($row=mysqli_fetch_array($query)){
   $students=$row['name'];
  //echo $row['name'];
 
}

//  $sql="SELECT COUNT(teacherid)
//  FROM students;";

// $result=mysqli_query($conn,$sql);

// echo $result;
// die();


?>
  <?php $query=mysqli_query($conn,"SELECT count( * ) as name FROM `teachers` ");
while($row=mysqli_fetch_array($query)){ 

$teachers=$row['name'];

}
  ?>  
            <div class="cardbox">         
                  <div class="card"> 
                    <div>
                        <div class= "numbers"><?php echo $students+$teachers; ?></div>
						<div class= "cardname">Total Users</div>
                    </div>
                    <div class="iconbox">
                        <span class="material-icons">people</span>
                    </div>
				</div>
				<div class="card"> 
					<div>
                        <div class= "numbers"><?php echo $teachers; ?></div>
						<div class= "cardname">Total Teachers</div>
                    </div>
                    <div class="iconbox">
                        <span class="material-icons">person_outline</span>
                    </div>
				</div>
				<div class="card"> 
					<div>
                        <div class= "numbers"><?php echo $students; ?></div>
						<div class= "cardname">Total Students</div>
                    </div>
                    <div class="iconbox">
                        <span class="material-icons">perm_identity</span>
                    </div>
			 </div>
           </div>
		   <div class="container-fluid">
  
  <div class="row">
    <div class="col-sm-4" style="background-color:lavender;">
    <?php
    
$select="SELECT s.name, h.score FROM history as h INNER JOIN students as s ON s.email= h.email ORDER BY score DESC LIMIT 3 ";
if (!$result = mysqli_query($conn, $select)) {
    exit(mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {




  ?>
	<table class="table">
    <thead>
    <tr>
        <th>Top Ranker</th>
       
      </tr>
    </thead>
    <?php   

while ($row = mysqli_fetch_assoc($result)) {
  // while($row1=mysqli_fetch_array($conn,$select)){
    $score=$row['score'];
    $name=$row['name'];
   // $id=$row['id'];
  ?>
     
    <tbody>
           
      <tr class="success">
      <td>Name: <?php echo $name;?>
     <h5 class="float-end"> Score: <?php echo $score;?></h5></td>
       
       </tr>      
      
       <?php } } 
      
      else{
       
      }
      ?>
      
    </tbody>
  </table>
</div>
    <div class="col-sm-4" style="background-color:lavenderblush;">
    <?php
$select="select * from assignment";
if (!$result = mysqli_query($conn, $select)) {
    exit(mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {




  ?>
	<table class="table">
    <thead>
      <tr>
        <th>Assignments</th>
       
      </tr>
    </thead>
    <?php   

while ($row = mysqli_fetch_assoc($result)) {
  // while($row1=mysqli_fetch_array($conn,$select)){
    $name=$row['question_file'];
    $id=$row['id'];
  ?>
    <tbody>
      <tr>
      <td> <a href="download.php?filename=<?php echo $name;?>" target="_blank"><?php echo $name ;?></a></td>
       
      </tr>      
     
      <?php } } 
     
     else{
      
     }
     ?>
    </tbody>
  </table>
</div>
    <div class="col-sm-4" style="background-color:lavender;">
    <?php
$select="select * from notes";
if (!$result = mysqli_query($conn, $select)) {
    exit(mysqli_error($conn));
}
if (mysqli_num_rows($result) > 0) {




  ?>
	<table class="table">
    <thead>
   
      <tr>
        <th>Notes</th>
      </tr>
    </thead>
    <?php   

while ($row = mysqli_fetch_assoc($result)) {
  // while($row1=mysqli_fetch_array($conn,$select)){
    $name=$row['notes_file'];
    $id=$row['id'];
  ?>
    <tbody>
      <tr>
      <td> <a href="download.php?filename=<?php echo $name;?>" target="_blank"><?php echo $name ;?></a></td>
       
      </tr>      
      <?php } } 
     
     else{
      
     }
     ?>
    </tbody>
  </table>
</div>
  </div>
</div>

	</div>
     <script>
	let menu = document.querySelector('.menu');
    let title = document.querySelector('.tite');
	let heading = document.querySelector('.heading');
	let main = document.querySelector('.main');

	menu.onclick = function()
	{
        heading.classList.toggle('active');
        main.classList.toggle('active');
        title.classList.toggle('active');
        
        
	}
     </script>
</body>
</html>

