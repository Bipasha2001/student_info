
<?php   
include('header.php');  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/instascan.min.js"></script>
</head>
<body>
	
	<a href="timetable.php" style="text-decoration: none;"><h1 class="btn btn-success btn-lg" style="color: white;">Home </h1></a>

	<div class="container">
		<div class="row justify-content-center mt-5">
			<div class="col-md-5">
				<div class="card-header bg-transparent mb-0"><h5 class="text-center"><span class="font-weight-bold text-primary">Scan QR and check scanned data if data == valid then click on submit else scan it again.</span></h5></div>
				
				<div>
        

<?php
                                                    
                                                   
                                                if(isset($_GET['success']) && $_GET['success']== "yes"){
                                                        ?>

                    <div class="alert alert-success m-5 " role="alert"> Your Attendance is Recorded.
                    </div>

                <?php } ?>
    </div>
					<div class="card-body">
						<video id="preview" width="300" height="300"></video>
						<form action="scandata.php" method="POST">
						<div class="form-group">
							Enrollment No.:<input type="text" class="form-control" id="text" name="text" readonly="" /><br>
							
							
						Select Day:<select class="form-control" name="day">
        <option selected="selected">Choose Week Day</option>
        <?php  
        
        $subject = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        
        
        foreach($subject as $item){
            echo '<option value="' . strtoupper($item) . '">' . $item . '</option>';
        }
        ?>
    </select><br>
    Select Lecture Time:<input type="time" name="time" class="form-control">
							
    <br><br>
    <script type="text/javascript">
    	
    </script>
							<input type="submit" class="btn btn-info" name="submit">
						</div>
					</form>
				</div>
				
			</div>
			
		</div>
		
	</div>
	<div class="row justify-content-center mt-5">
		<div class="col-md-5">
	<div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
  <label class="btn btn-primary active">
	<input type="radio" name="options" value="1" autocomplete="off"checked> <span  style="font-size: 40px;" >Front Camera</span>
  </label>
  <label class="btn btn-secondary">
	<input type="radio" name="options" value="2" autocomplete="off"><span  style="font-size: 40px;" > Back Camera</span>
  </label>
</div>

<br><br>
</div>
</div>


</body>

<script type="text/javascript">
	
	var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), scanPeriod: 5, mirror: false });
	scanner.addListener('scan',function(content){
		$("#text").val(content);
					
});
	Instascan.Camera.getCameras().then(function (cameras){
		if(cameras.length>0){
			scanner.start(cameras[0]);
			$('[name="options"]').on('change',function(){
				if($(this).val()==1){
					if(cameras[0]!=""){
						scanner.start(cameras[0]);
					}else{
						alert('No Front camera found!');
					}
				}else if($(this).val()==2){
					if(cameras[1]!=""){
						scanner.start(cameras[1]);
					}else{
						alert('No Back camera found!');
					}
				}
			});
		}else{
			console.error('No cameras found.');
			alert('No cameras found.');
		}
	}).catch(function(e){
		console.error(e);
		alert(e);
	});

</script>