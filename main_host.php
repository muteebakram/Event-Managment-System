<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 8px 20px ;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 2px 2px;
    cursor: pointer;
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

  //$eventid = $_SESSION['eventid'];
//session_start();
  $email=$_SESSION['email'];
 // $_SESSION['eventname']=$eventname;

  $db=mysqli_connect("localhost","admin","admin","ems");

  if(mysqli_connect_error())
      die ("There is no database :(");

   $query="SELECT eventid,eventname,eventhostname,eventvenue,starttime,endtime,seats,price FROM event e, user_host u WHERE u.email=e.email and u.email='$email'";

   $result=mysqli_query($db,$query);
  
   if (mysqli_num_rows($result) > 0) 
   {
      while($row = mysqli_fetch_assoc($result)) 
      {
          ?>
          <div class="row">
            <div class="column">
            <div class="card">
              <h3><?php echo $row["eventname"] ?></h3>
              <p><?php echo "Event ID : ".$row["eventid"]?></p>
              <p><?php echo $row["eventhostname"]?></p>
              <p> 
                <div class="container-login100-form-btn" input type = "submit" name="submit">
                  <button class="button" >
                  <a href="viewbooking.php?inid=<?php echo htmlentities($row['eventid']); ?>">View </a> 
                </button>
                  <button class="button" color="green">
                  <a href="editevent.php?inid=<?php echo htmlentities($row['eventid']); ?>">Edit </a> 
                  </button>
                  <button class="button" color="green">
                  <a href="delete.php?inid=<?php echo htmlentities($row['eventid']); ?>">Delete </a> 
                  </button>
                </div>
              </p>  
          </div>
        </div>

        <?php

      }

      
  } 
  else 
  {
      ?>
      <!DOCTYPE html>
      <html>
      <body>
        <h2 style="text-align: center; ">You have no events :(</h2>
      
      </body>
      </html>
      <?php
  }

mysqli_close($db);
?>
