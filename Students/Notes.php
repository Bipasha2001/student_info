

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Student Information System</title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  
  
<style type="text/css">
    .filterable {
    margin-top: 1px;
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

</head>

<body>
 

 
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
      <section id="featured-services" class="featured-services">
      <div class="container">

      
        <div class="row">
         
        
        <?php
include "db.php"; 
session_start();

 
$users = '<table class="table table-hover">
<tr>
  
</tr>
';

$query = "SELECT * FROM notes";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $number = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      
        $users .= '<tr>
            
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
<div class="card">    
<div class="row">
       
    	<h5 class="card-header bg-success text-center text-white">Uploaded Notes <a href="./index.php"><button class="btn btn-primary  float-end">Dashboard</button></a></h5>
    	
            <div class="row">
        <div class="col-md-6 card ">
           
        </div>
    </div>
        <div class=" filterable" style="border-color: #00bdaa;">
            <div class="panel-heading" style="background-color: #ff6200">
              
                <div class="float-right" >
                    <button class="btn btn-success btn-filter"><span class="glyphicon glyphicon-filter"></span> Click Me For Search</button>
                </div>
            </div>
            <table class="table">
                <thead class="card-header">
                    <tr class="filters">
                       
                        <th><input type="text" class="form-control" placeholder="Teacher Name" disabled></th>
                      
                        <th><input type="text" class="form-control" placeholder="Subject Code" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Subject Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Uploaded Notes" disabled></th>
                        
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
                         $query = "SELECT * FROM notes ";
                        }
                            $result = mysqli_query($conn, $query);
                        if(mysqli_num_rows($result) > 0)
                        {

                         while($row = mysqli_fetch_array($result))
                         {
                          $name=$row['notes_file'];
                          $id=$row['id'];
                          
                            $query1 = "SELECT * FROM teachers where teacherid = '$row[teacher_id]' ";
                            $result1 = mysqli_query($conn, $query1);
                            $t_name = "";
                            while($row1 = mysqli_fetch_array($result1)){
                                $t_name = $row1['name'];
                            }

                       ?>
                            
                            <td><?php echo $t_name;?></td>
                            <td><?php echo $row['sub_code'];?></td>
                            <td><?php echo $row['sub_name'];?></td>
                           
                                              
                           <td> <a href="download.php?filename=<?php echo $name;?>"><?php echo $name ;?></a></td>

                          
                           </tr>
                        </div>
                          
                          <?php
                         }
                        // echo $output;
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        </div>
      </div>
      


         
        </div>

      </div>
    </section>
    
      </div>
    </div>
    </div>
  </section>

 
   

  

  

  

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
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/main.js"></script>

</body>

</html>