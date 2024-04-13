<?php

 include_once '../db.php';
 session_start();

      #setting validation error array
      $current_id = $_SESSION["enrollment"];

     
      
      $query_login = "SELECT * FROM students WHERE enrollment ='".$current_id."'";
      $result_login = $conn->query($query_login) or die($conn->error);

      while($row = $result_login->fetch_assoc()){
          $username = $row["name"];
          $email = $row["email"];
          $phone = $row["phone"];
          $sem = $row["sem"];
          $div = $row["division"];
         
          $image_profile = $row["photo"];
      }

      $errors = array();
      #checking if form was submitted
      if (isset($_POST["submit"])) {
            $name=mysqli_real_escape_string($conn, $_POST["name"]);
            $email=mysqli_real_escape_string($conn, $_POST["email"]);

            $phone=mysqli_real_escape_string($conn, $_POST["phone"]);

            $address=mysqli_real_escape_string($conn, $_POST["div"]);

            $experience=mysqli_real_escape_string($conn, $_POST["sem"]);

           
        $image = $_FILES['photo']['name'];
        $images = addslashes(file_get_contents($_FILES["photo"]["tmp_name"]));
          if (count($errors)== 0) {

      $query=" UPDATE students SET name = '$name', email= '$email', division='$address',sem='$experience',  phone='$phone', photo='$images' WHERE enrollment ='".$current_id."' ";

            
          if (mysqli_query($conn, $query)) {
            header('Location: Profile.php');

           die();

               header('Location: Profile.php');

           } else{
                
              array_push($errors, "Profile Updating failed try again");
            }
             
             }

          }
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Profile.css">
</head>

<body >

    <!-- <h2 style="text-align: left ">You can Edit Your User Profile From Here !!!</h2> -->

    <div class="card">
        <?php
    if($image_profile == null){
      echo '<img src="../profile icon.png" alt="Profile Picture" style="width:85%;padding:10px">';
    }else{
      echo '<img alt="Profile Picture" style="width:85%;padding:10px" src="data:image;base64,'.base64_encode($image_profile).'">';
    }
  ?>
        <h1>
          <?php
      echo $username;
    ?>
        </h1>
        <h1>
          <?php
      echo $sem." ".$div;
    ?>
        </h1>
     
        </p>
        <p class="title">
            <?php
      echo $phone;
    ?>
        </p>
        <p class="title">
            <?php
      echo $email;
    ?>
        </p>
       
        
        <div style="margin: 24px 0;">
            <button class="contact-link" onclick="openForm()">Edit</button>
            <br>
            <br>
            <a href="../index.php"> <button class="contact-link" >Back</button></a>
            <div class="form-popup" id="myForm">
                <form action=" " enctype="multipart/form-data" class="form-container" method="POST">
                    <label for="username"><b>Name</b></label>
                    <input type="text" placeholder="Enter Your Name" name="name" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>
                    <label for="phone-number"><b>Phone No</b></label>
                    <input type="text" placeholder="Enter Number" name="phone" required><br>
                    <label for="division"><b>Division</b></label>
                    <input type="text" placeholder="Enter Division" name="div" required>
                    <label for="Semester"><b>Semester</b></label>
                    <input type="text" placeholder="Enter Semester" name="sem" required>
                   
                 
                    <label for="Image"><b>Image</b></label>
                    <input type="file" placeholder=" " name="photo" required><br><br>

                    <button type="submit" value="submit" name="submit" class="btn">Save</button>
                    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
                   
                </form>
               
            </div>
        </div>
        <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
        </script>
</body>

</html>