<!DOCTYPE html>
<html>
<head>
  <title>ViewEvent</title>
 
 
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 10px ;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 2px;
    cursor: pointer;
    margin-left: 20px;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
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

.column {
  float: left;
  width: 25%;
  padding: 10px 10px 10px 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 10 -5px ;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

.card {
  box-shadow: 0 4px 8px  rgba(0, 0, 0, 0.2);
  padding: 8px;
  text-align: center;
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="main_host.php">Event Management System</a>
  <a  href="addevent.html">Add Event</a>
  <a  href="delete.html">Delete Event</a>
  <div  style="float: right;">
    <a class="ind" style="float: right;"><?php session_start();echo $_SESSION['email'];?>
    <a colspan="4" href="index_host.html">Logout</a>
</div>
</div>
<br>
</body>
</body>
</html>
<?php

  $db=mysqli_connect("localhost","admin","admin","ems");

  if(mysqli_connect_error())
      die ("There is no database :(");

   //$count = "SELECT COUNT(*) FROM event;"
    if(isset($_GET['inid']))
    {
      $eventid=$_GET['inid'];
    }

   $query="SELECT * FROM event WHERE eventid=$eventid";

   $result=mysqli_query($db,$query);

   if (mysqli_num_rows($result) > 0) 
   {

      echo '<table align="left" cellspacing="5" cellpadding="8">
        <td align="left"><b>Event Name</b></td>
        <td align="left"><b>Event Hostname</b></td>
        <td align="left"><b>Event Venue</b></td>
        <td align="left"><b>Start time</b></td>
        <td align="left"><b>End time</b></td>
        <td align="left"><b>Seats</b></td>
        <td align="left"><b>Price</b></td>
        <td align="left"><b>Description</b></td></tr>';
      while($row = mysqli_fetch_assoc($result)) 
      {
          echo '<tr><td align="left" >'.
              $row["eventname"].'</td><td align="left">'.
              $row["eventhostname"].'</td><td align="left">'.
              $row["eventvenue"].'</td><td align="left">'.
              $row["starttime"].'</td><td align="left">'.
              $row["endtime"].'</td><td align="left">'.
              $row["seats"].'</td><td align="left">'.
              $row["price"].'</td><td align="left">'.
              $row["description"].'</td><td align="left">';

          echo "</tr>";
      }
      echo "</table>";
  } 
  else 
  {
      echo "0 results";
  }

mysqli_close($db);
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <br>
  <br>
  <br>
  <br>
  <p align="left"> 
      <button class="button" name="submit">
          <a href="main.php" class="button">Back</a>
      </button>
  </p>
</body>
</html>