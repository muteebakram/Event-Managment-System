<?php
	$email;
	$eventid=0;
	session_start();
	$eventname=$_SESSION['eventname'];

	$db=mysqli_connect("localhost","admin","admin","ems");
	
	if(isset($_GET['inid']))
	{
		$eventid=$_GET['inid'];
	}
	//echo $eventid;
	$email = $_SESSION['email']; 
	if(mysqli_connect_error())
      die ("There is no database :(");


	$query = "DELETE ticket, event FROM ticket, event WHERE ticket.eventid=event.eventid AND event.eventid='$eventid'	";
	$query1 = "SELECT eventname FROM event WHERE eventid='$eventid'";
	$result=mysqli_query($db,$query1);
		if($row = mysqli_fetch_assoc($result))
			$eventname=$row["eventname"];

	if(mysqli_query($db, $query))
	{
		//echo "<script> alert('Event is deleted');</script>";
      	//header("Refresh:0.5;url=main_host.php");
	} 
	else
	{
	    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
 
mysqli_close($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Event</title>
<br>


</head>
<style>
body 
{
  margin: 0;
  font-family: Arial, Helvetica, Verdana, sans-serif;
}
.button 
{
    background-color: #4CAF50;
    border: none;
    color: white;
    padding-top: 20px;
    padding: 8px 10px ;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
    margin-left: 20px;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 20px 16px;
  text-decoration: none;
  font-size: 20px;
  font-style: bold;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
}

</style>
<body>
<div style="align-self: center;">
	
	<h1> Are sure you want to delete <?php echo "'".$eventname."'";?> event?</h1>
	<h2> You'll loose all the bookings !</h2>
	
	<button class="button" name="submit" ">
		<a href="main_host.php">Delete event </a>
	</button>
	<br>
	<br>
	<button class="button" ">
		<a href="main_host.php">Cancel</a>
	</button></p>

</div>

</body>
</html>