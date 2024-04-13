<?php


require_once "db.php";
$weekday=$_POST['weekday'];
$subject=$_POST['subject'];
$Teachers=$_POST["Teachers"];
$subjectcode=$_POST["subjectcode"];
$TTime=$_POST["Time"];

switch ($weekday) {
	case 'MONDAY':
		# code...
	
	$sql="INSERT INTO `monday`(subject, subjectcode, Ttime, teachers) VALUES ('$subject','$subjectcode','$TTime','$Teachers')";

if ($conn->query($sql) === TRUE) {
	header("location:testtimetable.php?success=yes");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


		break;
		case 'TUESDAY':
		# code...
		$sql="INSERT INTO `tuesday`(subject, subjectcode, Ttime, teachers) VALUES ('$subject','$subjectcode','$TTime','$Teachers')";

if ($conn->query($sql) === TRUE) {
	header("location:testtimetable.php?success=yes");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		break;
		case 'WEDNESDAY':
		# code...
		$sql="INSERT INTO `wednesday`(subject, subjectcode, Ttime, teachers) VALUES ('$subject','$subjectcode','$TTime','$Teachers')";

if ($conn->query($sql) === TRUE) {
	header("location:testtimetable.php?success=yes");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		break;
		case 'THURSDAY':
		# code...
		$sql="INSERT INTO `thursday`(subject, subjectcode, Ttime, teachers) VALUES ('$subject','$subjectcode','$TTime','$Teachers')";

if ($conn->query($sql) === TRUE) {
	header("location:testtimetable.php?success=yes");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		break;
		case 'FRIDAY':
		# code...
		$sql="INSERT INTO `friday`(subject, subjectcode, Ttime, teachers) VALUES ('$subject','$subjectcode','$TTime','$Teachers')";

if ($conn->query($sql) === TRUE) {
	header("location:testtimetable.php?success=yes");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		break;
		case 'SATURDAY':
		# code...
		$sql="INSERT INTO `saturday`(subject, subjectcode, Ttime, teachers) VALUES ('$subject','$subjectcode','$TTime','$Teachers')";

if ($conn->query($sql) === TRUE) {
	header("location:testtimetable.php?success=yes");
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
		break;
	
	default:
		echo "Worng !! ._.";
		break;
}

