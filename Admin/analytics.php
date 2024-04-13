<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
<link rel="stylesheet" href="stylee.css">
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer1", {
	title: {
		text: "Push-ups Over a Week"
	},
	axisY: {
		title: "Number of Push-ups"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
    <div class="container1">
		<div class="heading">
			<span class="heading"></span>
    </div>
    <div class="db">
        <ul>
            <li>
                    <a href="dashboard.php">
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
                <a href="#">
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
 
$dataPoints = array( 
	array("label"=>"Assignments", "y"=>64.02),
	array("label"=>"Attendance", "y"=>12.55),
	array("label"=>"Notes", "y"=>8.47),

	array("label"=>"Exam", "y"=>4.29),
	array("label"=>"Users", "y"=>4.59)
)
 
?>


<div id="chartContainer" style="height: 370px; width: 100%;"></div>
</div>



<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "System Analytics"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>    
    
    
    
    
         
    
     

</body>
</html>