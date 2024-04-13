

<?php
//$sql = "INSERT INTO std_attendance (enrollment,subject,teacher)
//VALUES ('$data','$subject','$teacher')";

require_once "db.php";
$weekday=$_POST['weekday'];
$subject=$_POST['subject'];
$Teachers=$_POST["Teachers"];
$subjectcode=$_POST["subjectcode"];
$TTime=$_POST["Time"];



#Here we get the time and weekday
 if ( $weekday ==$_POST['weekday'] && $TTime ==$_POST['Time']) {

 	
//$sql="UPDATE monday SET subject=$subject,subjectcode=$subjectcode,Ttime=$TTimes,teachers=$Teachers WHERE Ttime=09:30";
$sql="UPDATE monday
SET subject='$subject',subjectcode='$subjectcode',Ttime='$TTime',teachers='$Teachers' 
WHERE Ttime='$TTime'";
if ($conn->query($sql) === TRUE) {
  header('location:updatetimetable.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else{
	echo "Worng Entry";
}
 	
 



#Here we get the time and weekday
 if ( $weekday ==$_POST['weekday'] && $TTime ==$_POST['Time']) {

 	
//$sql="UPDATE monday SET subject=$subject,subjectcode=$subjectcode,Ttime=$TTimes,teachers=$Teachers WHERE Ttime=09:30";
$sql="UPDATE tuesday
SET subject='$subject',subjectcode='$subjectcode',Ttime='$TTime',teachers='$Teachers' 
WHERE Ttime='$TTime'";
if ($conn->query($sql) === TRUE) {
  header('location:updatetimetable.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 }	
 else{
	echo "Worng Entry";
}
 	
 


#Here we get the time and weekday
 if ( $weekday ==$_POST['weekday'] && $TTime ==$_POST['Time']) {

 	
//$sql="UPDATE monday SET subject=$subject,subjectcode=$subjectcode,Ttime=$TTimes,teachers=$Teachers WHERE Ttime=09:30";
$sql="UPDATE wednesday
SET subject='$subject',subjectcode='$subjectcode',Ttime='$TTime',teachers='$Teachers' 
WHERE Ttime='$TTime'";
if ($conn->query($sql) === TRUE) {
  header('location:updatetimetable.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 }	
 else{
	echo "Worng Entry";
}
 	



#Here we get the time and weekday
 if ( $weekday ==$_POST['weekday'] && $TTime ==$_POST['Time']) {

 	
//$sql="UPDATE monday SET subject=$subject,subjectcode=$subjectcode,Ttime=$TTimes,teachers=$Teachers WHERE Ttime=09:30";
$sql="UPDATE thursday
SET subject='$subject',subjectcode='$subjectcode',Ttime='$TTime',teachers='$Teachers' 
WHERE Ttime='$TTime'";
if ($conn->query($sql) === TRUE) {
  header('location:updatetimetable.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 }	
 else{
	echo "Worng Entry";
}
 	



#Here we get the time and weekday
 if ( $weekday ==$_POST['weekday'] && $TTime ==$_POST['Time']) {

 	
//$sql="UPDATE monday SET subject=$subject,subjectcode=$subjectcode,Ttime=$TTimes,teachers=$Teachers WHERE Ttime=09:30";
$sql="UPDATE friday
SET subject='$subject',subjectcode='$subjectcode',Ttime='$TTime',teachers='$Teachers' 
WHERE Ttime='$TTime'";
if ($conn->query($sql) === TRUE) {
  header('location:updatetimetable.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 }	
 else{
	echo "Worng Entry";
}
 	





#Here we get the time and weekday
 if ( $weekday ==$_POST['weekday'] && $TTime ==$_POST['Time']) {

 	
//$sql="UPDATE monday SET subject=$subject,subjectcode=$subjectcode,Ttime=$TTimes,teachers=$Teachers WHERE Ttime=09:30";
$sql="UPDATE saturday
SET subject='$subject',subjectcode='$subjectcode',Ttime='$TTime',teachers='$Teachers' 
WHERE Ttime='$TTime'";
if ($conn->query($sql) === TRUE) {
  header('location:updatetimetable.php?success=yes');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
 }	
 else{
	echo "Worng Entry";
}
 	







?>