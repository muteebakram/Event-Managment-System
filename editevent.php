<?php
	session_start();
	if(isset($_POST['submit']))
	{	
		$eventid=0;
		$email="";	
		$eventname="";
		$eventvenue=0;
		$starttime=0;
		$endtime=0;
		$seats=0;
		$price=0;
		$description='';
		$db=mysqli_connect("localhost","admin","admin","ems");
							
		if(mysqli_connect_error())
			die ("There is no database :(");		
							
		if(isset($_GET['inid']))
		{
			$eventid=$_GET['inid'];
		}

		$email=$_SESSION['email'];

		if(isset($_POST['eventname']))
		$eventname = $_POST['eventname'];
		
		if(isset($_POST['eventvenue']))
		$eventvenue = $_POST['eventvenue'];
		
		if(isset($_POST['starttime']))
		$starttime = $_POST['starttime'];
		
		if(isset($_POST['endtime']))
		$endtime = $_POST['endtime'];
		
		if(isset($_POST['price']))
		$price = $_POST['price'];

		if(isset($_POST['seats']))
		$seats = $_POST['seats'];
		
		if(isset($_POST['description']))
		$description = $_POST['description'];
		

		$query = "UPDATE event SET eventname='$eventname', eventvenue='$eventvenue', starttime='$starttime', endtime='$endtime', price='$price',seats='$seats', description='$description' WHERE email='$email' and eventid='$eventid'";
							
		if(mysqli_query($db, $query))
		{
			//echo $email;				
			header("location=main_host.php");
		} 
		else
		{
			echo "ERROR: Could not able to execute ";
			mysqli_error($db);
		}

	}
					
?> 
	
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit Event</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">		
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				

				<form class="login100-form validate-form" method="POST" >
					<span class="login100-form-title">
						Edit Event  
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Event Name is required">
						<input class="input100" type="text" name="eventname" placeholder="Event Name">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Event Venue is required">
						<input class="input100" type="text" name="eventvenue" placeholder="Event Venue">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Start time is required">
						<input class="input100" type="text" name="starttime" placeholder="Start time">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "End time is required!">
						<input class="input100" type="text" name="endtime" placeholder="End time">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Price is required!">
						<input class="input100" type="text" name="price" placeholder="Price">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Seats is required!">
						<input class="input100" type="text" name="seats" placeholder="Seats">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate = "Description is required!">
						<input class="input100" type="text" name="description" placeholder="Description">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn" input type = "submit">
						<button class="login100-form-btn" name="submit">
							Edit Event
						</button>
					</div>
				</form>
			</div>
		</div>
	</div> 
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

