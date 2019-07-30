<?php
session_start();
$email=$_SESSION['email'];
require("fpdf/fpdf.php");
$eventid=15;
$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont("Arial","B",20);

$db=mysqli_connect("localhost","admin","admin","ems");

  if(mysqli_connect_error())
      die ("There is no database :(");

   //$count = "SELECT COUNT(*) FROM event;"
    if(isset($_GET['inid']))
    {
      $eventid=$_GET['inid'];
    }

   $query="SELECT * FROM event WHERE eventid=$eventid";
   $query1="SELECT * FROM user WHERE email='$email'";

   $result=mysqli_query($db,$query);
   if($row = mysqli_fetch_assoc($result))
   {
   		$eventname=$row["eventname"];
        $eventhostname=$row["eventhostname"];
        $eventvenue=$row["eventvenue"];
        $starttime=$row["starttime"];
        $endtime=$row["endtime"];
        $seats=$row["seats"];
        $price=$row["price"];
        $description=$row["description"];
   }
   $result1=mysqli_query($db,$query1);
   if($row1 = mysqli_fetch_assoc($result1))
   {
   		$name=$row1["name"];
        $phoneno=$row1["phoneno"];
        $address=$row1["address"];
   }
   //echo $eventvenue;
  	$pdf->Cell(0,10,"Event Management System",0,1,'C');
  	$pdf->SetFont("Arial","",12);
  	$pdf->Cell(0,10,"",0,1,'C');

  	$pdf->Cell(50,10,"Name ",1,0);
  	$pdf->Cell(100,10,"{$name}",1,1);

  	$pdf->Cell(50,10,"Phone No ",1,0);
  	$pdf->Cell(100,10,"{$phoneno}",1,1);
  	
  	$pdf->Cell(50,10,"Email ",1,0);
  	$pdf->Cell(100,10,"${email}",1,1);  
	$pdf->Cell(50,10,"Address ",1,0);
  	$pdf->Cell(100,10,"${address}",1,1);  	

  	$pdf->Cell(50,10,"Host Name ",1,0);
  	$pdf->Cell(100,10,"{$eventhostname}",1,1);
  	$pdf->Cell(50,10,"Event Venue ",1,0);
  	$pdf->Cell(100,10,"{$eventvenue}",1,1);
  	$pdf->Cell(50,10,"Start Time ",1,0);
  	$pdf->Cell(100,10,"{$starttime}",1,1);
  	$pdf->Cell(50,10,"End Time ",1,0);
  	$pdf->Cell(100,10,"{$endtime}",1,1);
  	$pdf->Cell(50,10,"Price ",1,0);
  	$pdf->Cell(100,10,"Rs {$price}",1,1);
  	$pdf->Cell(50,10,"Description ",1,0);
  	$pdf->Cell(100,10,"{$description}",1,1);
  	$pdf->Cell(0,10,"",0,1,'C');
  	$pdf->Cell(0,10,"",0,1,'C');
  	$pdf->Cell(0,10,"Booking has been confirmed. Please attended the event.",0,1);
  	$pdf->Cell(0,10,"Thank you. Vist 'wwww.eventmanagementsystem.com'",0,1);
	$pdf->output();


?>

