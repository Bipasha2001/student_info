<?php   
include('header.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
 
  </head>
<body>
<div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card-header bg-transparent mb-0">
                  <h5 class="text-center">
                    <br>
                    <br>
                    <span class="font-weight-bold text-primary"> Ask to Respected Faculty for Password </span>
                  </h5>
                </div>
                    <div class="card-body">
                        
                        
                        <div class="form-group">
      
<form method="POST" action="QRScannerSecurity_action.php">
	
	<input type="text" name="text" class="form-control" >
	<input type="submit"  name="submit"value="submit" class="btn btn-primary">
	
</form>
<?php

if(isset($_GET['error_password']) && $_GET['error_password']== "yes"){
  ?>
 <div class="alert alert-danger m-5 " role="alert">Please Enter Valid Random Password</div>
  <?php
}
else{
  echo "";
}
?>
</div>

</div>
</div>
</div>
</div>
</div>
</body>
</html>