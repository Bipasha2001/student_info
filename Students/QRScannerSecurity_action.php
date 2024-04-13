<?php 
//require_once "config.php";

$valid=$_POST["text"];
$conn = mysqli_connect('localhost','root','password','sis');
$sql = "SELECT * FROM random_password";

    $data=mysqli_query($conn,$sql);

    $a = mysqli_fetch_array($data);
	if($valid===$a['password'])
    {
        include('ScanQR.php');
    }
    else
    {
        header("location:QRScannerSecurity.php?error_password=yes");
        ?> 

 
       
  
 <?php 

    }




?>