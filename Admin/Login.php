<?php
// Initialize the session
session_start();
if(isset($_SESSION['enrollment'])) {
    header("Location:dashboard.php");
  }

// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
//     header("location: index.php");
//     exit;
// }
 
// Include config file
require_once "db.php";
 
// Define variables and initialize with empty values
$enrollment = $password = "";
$enrollment_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if enrollment is empty
    if(empty(trim($_POST['enrollment']))){
        $enrollment_err = "Please enter enrollment.";
    } else{
        $enrollment = trim($_POST["enrollment"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($enrollment_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT Admin_id, uname, password FROM admin WHERE uname = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_enrollment);
            
            // Set parameters
            $param_enrollment = $enrollment;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if enrollment exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $enrollment, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        // if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION['uname']=$_POST['enrollment'];
                            $_SESSION["loggedin"] = true;
                            $_SESSION["student_id"] = $id;
                            $_SESSION["enrollment"] = $enrollment;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard.php");
                        // } else{
                        //     // Display an error message if password is not valid
                        //     $password_err = "The password you entered was not valid.";
                        // }
                    }
                } else{
                    // Display an error message if enrollment doesn't exist
                    $enrollment_err = "No account found with that enrollment.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($conn);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ 
            font: 14px sans-serif; 
            background-image: url("./login.png");
        }
            .wrapper{ width: 350px;
            padding: 20px; 
          
          
            }
    </style>
</head>
<body >
    <div class=" d-flex justify-content-center">
    <div class="wrapper">
        <h2>Admin Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($enrollment_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="enrollment" class="form-control" required="" value="<?php echo $enrollment; ?>">
                <span class="help-block"><?php echo $enrollment_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required="">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input  style="background-color: #ff6200;" type="submit" class="btn btn-primary" value="Login">
            </div>
            <!-- <p>Don't have an account? <a href="register.php">Sign up now</a>.</p> -->
        </form>
    </div>   
    </div> 
</body>
</html>