

<?php

//attendance.php

//include('header.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
        <div class="card mt-3">
        <div class="card-body">
	<form action="timetable_action.php"  method="POST">
		<table>
        <h4 class="card-header text-center text-white title bg-dark mb-4">
        Manage Time Table As Your Choice</h4>
	
    <div>
        

<?php
                                                    
                                                   
                           if(isset($_GET['success']) && $_GET['success']== "yes"){
                                                        ?>

                    <div class="alert alert-success m-5 " role="alert"> Added 
                        Successfully
                    </div>

                <?php } ?>
    </div>
<tr>
<div class="input-group mb-3 input-group-lg">
  

  
<span class="input-group-text text-white bg-success">Week days:</span>

<select class="form-control" name="weekday">
        <option  selected="selected">Choose week day</option>
        <?php  
        
        $weekday = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
        
        
        foreach($weekday as $item){
            echo '<option value="' . strtoupper($item) . '">' . $item . '</option>';
        }
        ?>
    </select>
 </div>
</tr>
<tr>
<div class="input-group mb-3 input-group-lg">
	

	
<span class="input-group-text text-white bg-success">Subject:</span>

<select class="form-control" name="subject">
        <option selected="selected">Choose Subject</option>
        <?php  
        
        $subject = array('MAD','Class Test','ST','CMS','Project-II','E-Commerce');
        
        
        foreach($subject as $item){
            echo '<option value="' . strtoupper($item) . '">' . $item . '</option>';
        }
        ?>
    </select>
 </div>
</tr>
<tr>
	<div class="input-group mb-3 input-group-lg">
	

	
<span class="input-group-text text-white bg-success">Subject code:</span>

<input type="text" required="54" name="subjectcode" class="form-control" placeholder="05101031">
 </div>
</tr>
<tr>
	<div class="input-group mb-3 input-group-lg">
	

	
<span class="input-group-text text-white bg-success">Teachers:</span>

<select class="form-control" name="Teachers">
        <option selected="selected">Select Subject faculty</option>
        <?php  
        
        $Teachers = array('Dr. Priya Swaminarayan','Hina Chockshi','Kamini Solanki','Vijya Tulsani','Bhavika Vaghela','Dharmendra Rathod','Sohil Parmar','Bhaumik Shah','Poonam Parpana');
        
        
        foreach($Teachers as $item){
            echo '<option value="' . strtoupper($item) . '">' . $item . '</option>';
        }
        ?>
    </select>
 </div>
</tr>
    <br>
    <tr>
	<div class="input-group mb-3 input-group-lg">
	


<span class="input-group-text text-white bg-success">Select Lecture Time:</span>

<input type="time" name="Time" class="form-control" placeholder="09:30">
 </div>
</tr>
<tr>
	 <input class="btn btn-primary form-control" type="submit" name="submit" value="Submit">
     <a  href="./ManageTimebale.php"><input type="button"  class="btn btn-warning form-control mt-2 "  name="back" value="Back"></a>
    
</tr>
    </table>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
