<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="stylee.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/todo.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="heading">
			<span class="heading"></span>
			
	 	</div>
		<div class="db">
			<ul>
				<li>
					<a href="#">
						<span class="icon"></span>
				                <span class="material-icons">grid_view</span>
						<span class="title">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"></span>
						<span class="material-icons">people</span>
						<span class="title">Manage Teachers</span>
					</a>
				</li>
				<li>
					<a href="./view-users.php">
						<span class="icon"></span>
						<span class="material-icons">group</span>
						<span class="title">Manage Students</span>
					</a>
				</li>
				<li>
					<a href="#">
						<span class="icon"></span>
						<span class="material-icons">analytics</span>
						<span class="title">View Statistics</span>
					</a>
				</li>
				 <li>
                <a href="./resetPassword.php">
                    <span class="icon"></span>
                    <span class="material-icons">lock_reset</span>
                    <span class="title">Change Password</span>
                </a>
            </li>

				<li>
					<a href="./logout.php">
						<span class="icon"></span>
						<span class="material-icons">logout</span>
						<span class="title">Sign Out</span>
					</a>
				</li>
			</ul>
		</div>

        <main id="main">

<section id="featured-services" class="featured-services">
  <div class="container">

  <div id="dashboard" class="section-title">
      <span>Students List</span>
      <h2>Students List</h2>
     
    </div>
    <div class="row">
     
    
    <?php
include "db.php"; 

$message = "";
if (isset($_POST['submit'])) {
$allowed = array('csv');
$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if (!in_array($ext, $allowed)) {
    $message = 'Invalid file type or no file uploaded, please use .CSV file!';
} else {

    move_uploaded_file($_FILES["file"]["tmp_name"], "" . $_FILES['file']['name']);
    $file = "" . $_FILES['file']['name'];

    $query = <<<eof
    LOAD DATA LOCAL INFILE '$file'
     INTO TABLE students
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n'

    (id,name,surname,email,enrollment,password,rank,level)
eof;
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($con));
    }
    $message = "CSV file successfully imported!";
}
}

$users = '<table class="table table-bordered">
<tr>
<th>ID</th>
<th>name</th>
<th>surname</th>
<th>email</th>
<th>enrollment</th>
<th>password</th>
<th>rank</th>
<th>level</th>
<th>supervisor</th>
<th>second_supervisor</th>
<th>modules</th>
</tr>
';

$query = "SELECT * FROM students";
if (!$result = mysqli_query($conn, $query)) {
exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
$number = 1;
while ($row = mysqli_fetch_assoc($result)) {
    $users .= '<tr>
        <td>' . $number . '</td>
        <td>' . $row['name'] . '</td>
        <td>' . $row['enrollment'] . '</td>
        <td>' . $row['email'] . '</td>
        <td>' . $row['phone'] . '</td>
        <td>' . $row['password'] . '</td>
        <td>' . $row['sem'] . '</td>
    </tr>';
    $number++;
}
} else {
$users .= '<tr>
    <td colspan="4">Records not found!</td>
    </tr>';
}
$users .= '</table>';
?>







<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>



<div class="container">
<div class="row">
   
    <h1>List Of Students</h1>
    <hr>
        <div class="row">
    <div class="col-md-6 col-md-offset-0">
       
    </div>
</div>
    <div class="panel panel-primary filterable" style="border-color: #00bdaa;">
        <div class="panel-heading" style="background-color: #ff6200">
          
            <div class="float-right" >
                <button class="btn btn-success btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter Search</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr class="filters">
                    <th><input type="text" class="form-control" placeholder="Name" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Enrollment" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Phone" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Sem" disabled></th>
                    <th><input type="text" class="form-control" placeholder="Edit/Delete Student" disabled></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $output = '';
                    if(isset($_POST["query"]))
                    {
                     $search = mysqli_real_escape_string($conn, $_POST["query"]);
                     $query = "
                      SELECT * FROM students
                      WHERE name LIKE '%".$search."%'
                      OR surname LIKE '%".$search."%' 
                      OR email LIKE '%".$search."%' 
                      OR enrollment LIKE '%".$search."%' 
                     ";
                    }
                    else
                    {
                     $query = "SELECT * FROM students ORDER BY name asc";
                    }
                        $result = mysqli_query($conn, $query);
                    if(mysqli_num_rows($result) > 0)
                    {

                     while($row = mysqli_fetch_array($result))
                     {
                    $enrollment = $row["enrollment"];
                        
                      $output .= '
                       <tr>
                        <td>'.$row["name"].'</td>
                        <td>'.$row["enrollment"].'</td>
                        <td>'.$row["email"].'</td>
                        <td>'.$row["phone"].'</td>
                        <td>'.$row["sem"].'</td>

                      <td class="text-center">
                      <a class="btn-edit btn btn-info btn-xs" href="edit-user.php?id=' . $enrollment . '">
                      <span class=" glyphicon glyphicon-edit"></span> Edit</a>
                       <a href="remove-user.php?id=' . $enrollment . '"class="btn-remove btn btn-danger btn-xs">
                       <span class="glyphicon glyphicon-remove"></span>Delete</a></td>
                       </tr>
                    </div>
                      ';
                     }
                     echo $output;
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<style type="text/css">
.filterable {
margin-top: 15px;
}
.filterable .panel-heading .pull-right {
    margin-top: -20px;
}
.filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
}
.filterable .filters input[disabled]::-webkit-input-placeholder {
    color: #333;
}
.filterable .filters input[disabled]::-moz-placeholder {
    color: #333;
}
.filterable .filters input[disabled]:-ms-input-placeholder {
    color: #333;
}
</style>

<script type="text/javascript">
$(document).ready(function(){
    $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function(e){
        var code = e.keyCode || e.which;
        if (code == '9') return;
        
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');

        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });

        $table.find('tbody .no-result').remove();

        $rows.show();
        $filteredRows.hide();

        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});
</script>



     
    </div>

  </div>
</section>


<hr>
</main>
	</div>
     <script>
	let menu = document.querySelector('.menu');
    let title = document.querySelector('.tite');
	let heading = document.querySelector('.heading');
	let main = document.querySelector('.main');

	menu.onclick = function()
	{
        heading.classList.toggle('active');
        main.classList.toggle('active');
        title.classList.toggle('active');
        
        
	}
     </script>
</body>
</html>

