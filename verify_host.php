<?php

   $db=mysqli_connect("localhost","admin","admin","ems");
   $email = mysqli_real_escape_string($db,$_POST['email']);
   $password = mysqli_real_escape_string($db,$_POST['pass']); 

   session_start();
   $_SESSION['email'] = $email;

   if(mysqli_connect_error())
      die ("There is no database :(");

   $query="SELECT * FROM user_host WHERE email = '$email' and password = '$password'";

   $result=mysqli_query($db,$query);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //$active = $row['active'];
   $count = mysqli_num_rows($result);

?>

   
<?php
   if($count == 1)
   {
      header("Location:main_host.php");
   
   }
   else
   {
      echo "<script> alert('Email or Password is invalid');</script>";
      header("Refresh:0;url=index_host.html"); 
   }

mysqli_close($db);
?>