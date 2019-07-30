<?php
	session_start();
	if(isset($_POST['submit']))
	{	
		$ticketid;
		$eventid=0;
		$email="";	
		$cardname="";
		$cardno=0;
		$cvv=0;
		$expirydate=0;
		$db=mysqli_connect("localhost","admin","admin","ems");
							
		if(mysqli_connect_error())
			die ("There is no database :(");		
							
		if(isset($_GET['inid']))
		{
			$eventid=$_GET['inid'];
		}
		//echo $eventid;
		$email = $_SESSION['email'];
		//echo $email;
		if(isset($_POST['cardname']))
		$cardname = $_POST['cardname'];
		
		if(isset($_POST['cardno']))
		$cardno = $_POST['cardno'];
		
		if(isset($_POST['expirydate']))
		$expirydate = $_POST['expirydate'];
		
		if(isset($_POST['cvv']))
		$cvv = $_POST['cvv'];

		$query1= "SELECT ticketid FROM ticket ORDER BY ticketid DESC LIMIT 1";
		$result=mysqli_query($db,$query1);
		if($row = mysqli_fetch_assoc($result))
			$ticketid=$row["ticketid"]+1;
		//echo $ticketid;
	
		$query = "INSERT INTO ticket (ticketid,eventid,email,cardname,cardno,expirydate,cvv) VALUES ('$ticketid','$eventid','$email','$cardname','$cardno','$expirydate','$cvv')";
							
		if(mysqli_query($db, $query))
		{
			//echo "<script> alert('Ticket is booked');</script>";				
			header("Refresh:0.5;url=bookpdf.php");
		} 
		else
		{
			//echo "ERROR: Could not able to execute ";
			mysqli_error($db);
		}

	}
					
?> 
	
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Book Ticket</title>
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
				

				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-title">
						Card details  
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Name on Card is required">
						<input class="input100" type="text" name="cardname" placeholder="Name on Card">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Card No is required">
						<input class="input100" type="text" pattern= "[0-9]{16}"name="cardno" placeholder="Card Number">
						<span class="focus-input100"></span>
					</div>


					<div class="wrap-input100 validate-input" data-validate = "Expiry date is required">
						<input class="input100" type="text" pattern= "[2][01][0-9][0-9]" name="expirydate" placeholder="Expiry date">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "CVV is required!">
						<input class="input100" type="text" pattern="[0-9]{3}"  name="cvv" placeholder="CVV">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" input type = "submit">
						<button class="login100-form-btn" name="submit">
							Pay
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

