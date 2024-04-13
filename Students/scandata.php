<?php

// Include config file
require_once "db.php";



session_start();

  //$en_ss = $_SESSION['enrollment'];
  

if($_POST['text']==$_SESSION['enrollment']) {
    #code....



// $_POST["day"]=$_POST["day"];
// $time=$_POST["time"];
// echo $data;
//   echo $subject;
//   echo $teacher;
 
//   die();


 #Here we get the time and weekday
 if($_POST["day"] == "MONDAY" &&$_POST["time"] == "09:30") {

  $subject="Class Test";
  $teacher="Manish Joshi";

  
 }
 
 elseif($_POST["day"] == "MONDAY" &&$_POST["time"] == "10:30") {
  
     $subject="MAD";
       $teacher="Bhavika Vaghela";
 }

 elseif($_POST["day"] == "MONDAY" &&$_POST["time"]=="12:15") {
  
     $subject="Project";
     $teacher="Dharmendra Rathod";

 }
 elseif($_POST["day"] == "MONDAY" &&$_POST["time"]=="01:15") {
  
     $subject="Project";
     $teacher="Vijiya Tulsani";


 }
  elseif($_POST["day"] == "MONDAY" &&$_POST["time"]=="02:30") {
  
     $subject="CMS";
        $teacher="Sohil Parmar";
 }
  
 else{
  echo "invalid";
 }





 #Here we get the time and weekday
 if($_POST["day"] == "TUESDAY" &&$_POST["time"] == "09:30") {

  $subject="MAD";
  $teacher="Bhavika Vaghela";

  
 }
 
 elseif($_POST["day"] == "TUESDAY" &&$_POST["time"] == "10:30") {
  
     $subject="MAD";
       $teacher="Bhavika Vaghela";
 }

 elseif($_POST["day"] == "TUESDAY" &&$_POST["time"]=="12:15") {
  
     $subject="MAD-LAB";
     $teacher="Kamini Solanki";

 }
 elseif($_POST["day"] == "TUESDAY" &&$_POST["time"]=="01:15") {
  
     $subject="MAD-LAB";
     $teacher="Bhavika Vaghela";


 }
  elseif($_POST["day"] == "TUESDAY" &&$_POST["time"]=="02:30") {
  
     $subject="Value Added Course";
        $teacher="Any";
 }
  elseif($_POST["day"] == "TUESDAY" &&$_POST["time"]=="03:30") {
  
     $subject="Value Added Course";
        $teacher="Any";
 }
 else{
  echo "invalid";
 }


 #Here we get the time and weekday
 if($_POST["day"] == "WEDNESDAY" &&$_POST["time"] == "09:30") {

  $subject="Free";
  $teacher="Any";

  
 }
 
 elseif($_POST["day"] == "WEDNESDAY" &&$_POST["time"] == "10:30") {
  
     $subject="CMS";
       $teacher="Sohil Parmar";
 }

 elseif($_POST["day"] == "WEDNESDAY" &&$_POST["time"]=="12:15") {
  
     $subject="MAD";
     $teacher="Bhavika Vaghela";

 }
 elseif($_POST["day"] == "WEDNESDAY" &&$_POST["time"]=="01:15") {
  
     $subject="MAD";
     $teacher="Bhavika Vaghela";


 }
  elseif($_POST["day"] == "WEDNESDAY" &&$_POST["time"]=="02:30") {
  
     $subject="MAD";
     $teacher="Bhavika Vaghela";
 }
  elseif($_POST["day"] == "WEDNESDAY" &&$_POST["time"]=="03:30") {
  
     $subject="MAD";
     $teacher="Bhavika Vaghela";
 }
 else{
  echo "invalid";
 }


 #Here we get the time and weekday
 if($_POST["day"] == "THURSDAY" &&$_POST["time"] == "09:30") {

  $subject="BREAK";
  $teacher="Any";

  
 }
 
 elseif($_POST["day"] == "THURSDAY" &&$_POST["time"] == "10:30") {
  
     $subject=".NET LAB";
       $teacher="Dharmendra Rathod";
 }

 elseif($_POST["day"] == "THURSDAY" &&$_POST["time"]=="12:15") {
  
     $subject="MAD-LAB";
     $teacher="Kamini Solanki";

 }
 elseif($_POST["day"] == "THURSDAY" &&$_POST["time"]=="01:15") {
  
     $subject="MAD-LAB";
     $teacher="Bhavika Vaghela";


 }
  elseif($_POST["day"] == "THURSDAY" &&$_POST["time"]=="02:30") {
  
     $subject="PROJECT";
        $teacher="Abhisekh Mehta";
 }
  elseif($_POST["day"] == "THURSDAY" &&$_POST["time"]=="03:30") {
  
     $subject="PROJECT";
        $teacher="Vibhuti Patel";
 }
 else{
  echo "invalid";
 }


 #Here we get the time and weekday
 if($_POST["day"] == "FRIDAY" &&$_POST["time"] == "09:30") {

  $subject="CMS";
  $teacher="Sohil Parmar";

  
 }
 
 elseif($_POST["day"] == "FRIDAY" &&$_POST["time"] == "10:30") {
  
     $subject="E.COM/ST";
       $teacher="RAJESHWARI/POONAM";
 }

 elseif($_POST["day"] == "FRIDAY" &&$_POST["time"]=="12:15") {
  
     $subject="PROJECT";
     $teacher="Vijiya Tulsani";

 }
 elseif($_POST["day"] == "FRIDAY" &&$_POST["time"]=="01:15") {
  
     $subject="PROJECT";
     $teacher="Bhavika Vaghela";


 }
  elseif($_POST["day"] == "FRIDAY" &&$_POST["time"]=="02:30") {
  
     $subject="MAD";
        $teacher="Bhavika Tulsani";
 }
  elseif($_POST["day"] == "FRIDAY" &&$_POST["time"]=="03:30") {
  
     $subject="E.COM/ST";
       $teacher="RAJESHWARI/POONAM";
 }
 else{
  echo "invalid";
 }



 #Here we get the time and weekday
 if($_POST["day"] == "SATURDAY" &&$_POST["time"] == "09:30") {

  $subject="E.COM/ST";
       $teacher="RAJESHWARI/POONAM";

  
 }
 
 elseif($_POST["day"] == "SATURDAY" &&$_POST["time"] == "10:30") {
  
     $subject="LIBRARY";
       $teacher="Bhavika Vaghela";
 }

 elseif($_POST["day"] == "SATURDAY" &&$_POST["time"]=="12:15") {
  
     $subject="BSE";
     $teacher="Poonam Shah";

 }
 elseif($_POST["day"] == "SATURDAY" &&$_POST["time"]=="01:15") {
  
     $subject="E.COM/ST";
       $teacher="RAJESHWARI/POONAM";


 }
  elseif($_POST["day"] == "SATURDAY" &&$_POST["time"]=="02:30") {
  
     $subject="E.COM/ST";
       $teacher="RAJESHWARI/POONAM";
 }
  elseif($_POST["day"] == "SATURDAY" &&$_POST["time"]=="03:30") {
  
     $subject="E.COM/ST";
       $teacher="RAJESHWARI/POONAM";
 }
 else{
  echo "invalid";
 }





  }












  $data=$_POST["text"];

$date=date("Y/m/d");
  
$sql = "INSERT INTO attendance (enrollment,subject,teacher,recorded_at) VALUES ('$data','$subject','$teacher','$date')";

if ($conn->query($sql) === TRUE) {
  header('location:scanQR.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




?>