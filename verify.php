<?php

   $db=mysqli_connect("localhost","admin","admin","ems");
   $email = mysqli_real_escape_string($db,$_POST['email']);
   $password = mysqli_real_escape_string($db,$_POST['pass']);

   session_start();
   $_SESSION['email'] = $email;

   if(mysqli_connect_error())
      die ("There is no database :(");

   $query="SELECT * FROM user WHERE email = '$email' and password = '$password'";

   $result=mysqli_query($db,$query);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   $count = mysqli_num_rows($result);

   if($count == 1)
   {
      header("Location:main.php");
   }
   else
   {
      echo "<script> alert('Email or Password is invalid');</script>";
      header("Refresh:0.5;url=index.html");
   }

mysqli_close($db);
?>