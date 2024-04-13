<?php
// Initialize the session
session_start();
 
if(!isset($_SESSION['enrollment'])) {
  header("Location: ../index.html");
}
// echo $_SESSION['enrollment'];
// die;
require_once "db.php";

// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE admin SET password = ? WHERE uname = ?";
       
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["enrollment"];

            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
              
                header("location:dashboard.php");
                exit();
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
<html>
<head>
	<meta charset="utf-8">
	<title>Reset password</title>
	<link rel="stylesheet" type="text/css" href="reset-pass.css">
</head>
<body>
		<div class="card">
  <div class="card-body">
    <h2 class="card-title">Reset Password</h2>
    <p class="card-text">Please fill out this form to reset your password.</p>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    	<div class="<?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
<label for="newPassword">New Password:</label><br><br>
<input type="password" id="newPassword" name="new_password" title="New password" placeholder="New Password" value="<?php echo $new_password; ?>" /><br><br>
 <span class="help-block"><?php echo $new_password_err; ?></span>
</div>
<div class=" <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
<label for="confirmPassword">Confirm Password:</label><br><br>
<input type="password" id="confirmPassword" name="confirm_password" title="Confirm new password" placeholder="Confirm Password" /><br><br>
<span class="help-block"><?php echo $confirm_password_err; ?></span>
</div>
<button type="submit" value="Submit" class="btn-1">Change Password</button>
<a href="./dashboard.php"><button type="button" class="btn-2">Cancel</button></a>
</form>

  </div>
</div>



</body>
</html>