<?php
	$type='';
	$db=mysqli_connect("localhost","admin","admin","ems");
	 
	if(mysqli_connect_error())
      die ("There is no database :(");
  		//echo "established";
	 
	$name = mysqli_real_escape_string($db, $_REQUEST['name']);
	$email = mysqli_real_escape_string($db, $_REQUEST['email']);
	$password = mysqli_real_escape_string($db, $_REQUEST['pass']);
	$dob = mysqli_real_escape_string($db, $_REQUEST['dob']);
	$address = mysqli_real_escape_string($db, $_REQUEST['address']);
	$phoneno = mysqli_real_escape_string($db, $_REQUEST['phoneno']);
	$description = mysqli_real_escape_string($db, $_REQUEST['description']);
	$query = "INSERT INTO user_host(name,email,password,dob,address,phoneno,description) VALUES ('$name','$email','$password','$dob','$address','$phoneno','$description')";

	if(mysqli_query($db, $query))
	{
		header("Location:index_host.html");
	    echo "Records added successfully.";
	} 
	else
	{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
 
mysqli_close($db);
?>