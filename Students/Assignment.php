
         
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
  
</head>

<body>
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.html">SIS.</a></h1>

      <nav id="navbar" class="navbar">
        <ul>
          
          
          <li><a class="nav-link scrollto" href="./index.php">Back To Dashboard</a></li>
        
       
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header>

 

  <main id="main">

    <section id="featured-services" class="featured-services ">
      <div class="mt-5">
      <div class="container mt-5 ">
     
      <div id="dashboard" class="section-title mt-5">
     
          <h2>Assignments</h2>
         
        </div>
        <div class="row">
       
        </div>
        </div>
         
        </div>

      </div>
    </section>
    
   
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row">
        <?php 
 include("db.php");
       session_start();
$select="select * from assignment_submission where enrollment='$_SESSION[enrollment]' ";
       if (!$result = mysqli_query($conn, $select)) {
           exit(mysqli_error($conn));
       }
       if (mysqli_num_rows($result) > 0) {
       while ($row = mysqli_fetch_assoc($result)) {
         // while($row1=mysqli_fetch_array($conn,$select)){
         ?>
        <?php
           $subname=$row['sub_name'];
           $grade=$row['score'];
           $answerfile=$row['answer_file'];
             if($grade==true){
                    
            echo " <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Hurry !!</strong> Your ".$subname." Subject's Assignment ".$answerfile." Graded ".$grade." Marks
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
          } 
         }
        }



            ?>
<?php

        include("db.php");
       
     //  session_start();
       
      // $tid=$_SESSION['teacherid'];
       
       $select="select * from assignment ORDER BY id DESC";
       if (!$result = mysqli_query($conn, $select)) {
           exit(mysqli_error($conn));
       }
       if (mysqli_num_rows($result) > 0) {
       


        ?>
        <?php
       while ($row = mysqli_fetch_assoc($result)) {
         // while($row1=mysqli_fetch_array($conn,$select)){
           $aid=$row['id'];
           $assignmentFile=$row['question_file'];
           $teacherName=$row['teacher_name'];
           $sub_name=$row['sub_name'];
           $sub_code=$row['sub_code'];
           $uptime=$row['created_at'];
          
       
            ?>



<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <?php echo $teacherName; ?> posted a new assignment of  <?php echo   $sub_name; ?>    
         
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      
      <div class="container">
        <div class="row">
          <div class="col-sm">
          <h1><a href="downloadAssignment.php?filename=<?php echo $assignmentFile;?>" target="_blank"><?php echo $assignmentFile;?></a></h1>
          <h6 class="float-end">BY:- <?php echo  $teacherName. "<br>"."Posted: ".$uptime; ?> <br>
          <!-- <h6 class="float-end">Posted:<?php echo "      ". $uptime;  ?></h6> -->
           </h6>
         
          </div>
        
          <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
           

              <h5 class="card-title">Submit Assignment</h5>
                           
                 
                <form action="./UploadAssignment.php" method="POST" enctype="multipart/form-data">
                  <br>
               <?php // $_POST['sub_name']= $sub_name; ?>
               <input type="text" hidden name="asid" value="<?php echo $aid; ?>">
               <input type="text" hidden name="tid" value="<?php echo $teacherName; ?>">
                <input type="text" hidden name="subname" value="<?php echo $sub_name; ?>">
                <input type="text" hidden name="subcode" value="<?php echo $sub_code; ?>">

                <input type="file" name="photo" class="form-control mt-2" required="">
          
              <button name="submit" class="btn btn-primary mt-3">Upload</button>
              </form>
            </div>
          </div>
        </div>
        </div>
      </div>
      </div>
   <?php }
              } 
            
            else{
             
            }
           ?> 
    </div>
  </div>
 
        </div>
      </div>
      </div>
    </section>
<hr>
  </main>

  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>