<?php
	$db=mysqli_connect("localhost","admin","admin","ems");
	 
	if(mysqli_connect_error())
      die ("There is no database :(");
  	session_start();

  	$email = $_SESSION['email'];	
	$eventname = mysqli_real_escape_string($db, $_REQUEST['eventname']);
	$eventhostname = mysqli_real_escape_string($db, $_REQUEST['eventhostname']);
	$eventvenue = mysqli_real_escape_string($db, $_REQUEST['eventvenue']);
	$starttime = mysqli_real_escape_string($db, $_REQUEST['starttime']);
	$endtime = mysqli_real_escape_string($db, $_REQUEST['endtime']);
	$seats = mysqli_real_escape_string($db, $_REQUEST['seats']);
	$price = mysqli_real_escape_string($db, $_REQUEST['price']);
	$description = mysqli_real_escape_string($db, $_REQUEST['description']);

	$query = "INSERT INTO event (email,eventname,eventhostname,eventvenue,starttime,endtime,seats,price,description) VALUES ('$email','$eventname','$eventhostname','$eventvenue','$starttime','$endtime','$seats','$price','$description')";

	if(mysqli_query($db, $query))
	{
		echo "<script> alert('Event is added');</script>";
      	header("Refresh:1;url=main_host.php");
	} 
	else
	{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
 
mysqli_close($db);
?>