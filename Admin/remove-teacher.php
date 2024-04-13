<!DOCTYPE html>
<html>
	<?php 
	
		include "db.php";
	?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/css/bootstrap-slider.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.7.2/bootstrap-slider.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<title></title>
</head>
<body>
	<?php 
	if (isset($_GET['id'])) {
		$user = mysqli_real_escape_string($conn, $_GET['id']);

		$sql = "SELECT * FROM teachers WHERE teacherid = '$user'"; 
		$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
	
        while($row = mysqli_fetch_array($result)) { 
        	$name = $row['name'];
        	$sname = $row['teacherid'];
        	$email = $row['email'];
        	$user = $row['phone'];
        	$pass = $row['experience'];
		}
	}
	?>
	<div id="wrapper">
		<div id="page-wrapper">
			<div class="container-fluid">
				<div class="container">
				    <h1>Remove Teacher</h1>
				  	<hr>
					<div class="row">
				      <!-- edit form column -->
				      <div class="col-md-9 personal-info">
				        <div class="alert alert-info alert-dismissable">
				          <a class="panel-close close" data-dismiss="alert">×</a> 
				          <i class="fa fa-warning" style="color: red;"></i> Records deleted are <strong>NOT</strong> recoverable.
			          	</div>
				        <h3>Account Information</h3>
				        
				        <form class="form-horizontal" role="form" method="post">
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Name:</label>
				            <div class="col-lg-8">
				              <input class="form-control" type="text" value="<?php if (isset($_GET['id'])) { print $name; }?>" readonly>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Teacher ID:</label>
				            <div class="col-lg-8">
				              <input class="form-control" type="text" value="<?php if (isset($_GET['id'])) { print $sname; }?>" readonly>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-lg-3 control-label">Email:</label>
				            <div class="col-lg-8">
				              <input class="form-control" type="email" value="<?php if (isset($_GET['id'])) { print $email; }?>" readonly>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-md-3 control-label">Phone:</label>
				            <div class="col-md-8">
				              <input class="form-control" type="text" value="<?php if (isset($_GET['id'])) { print $user; }?>" readonly>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-md-3 control-label">Experience:</label>
				            <div class="col-md-8">
				              <input class="form-control" type="text" value="<?php if (isset($_GET['id'])) { print $pass; }?>" readonly>
				            </div>
				          </div>
				          <div class="form-group">
				            <label class="col-md-3 control-label"></label>
				            <div class="col-md-8">
				              <input type="submit" name="submit" class="btn btn-primary" value="Delete">
				              <span></span>
				              <input type="reset" class="btn btn-default" value="Cancel" onclick="goBack()">
				            </div>
				          </div>
				        </form>
				      </div>
				  </div>
				</div>
				<hr>
			</div>
		</div>
	</div>
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script>
		function goBack() {
			window.location = 'viewTeacher.php';
		}
	</script>
</body>

</html>

<?php 
	if(isset($_POST['submit'])) { 
		if (isset($_GET['id'])) {
			$user = mysqli_real_escape_string($conn, $_GET['id']);

			$query = "DELETE FROM teachers WHERE teacherid = '$user'";
			$result= mysqli_query($conn, $query) ;
		}

		echo "<script>goBack();</script>";
	}
?>