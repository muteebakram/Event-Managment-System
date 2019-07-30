<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {
  margin: 0;
  font-family: Arial, Helvetica, Verdana, sans-serif;
}
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
.mySlides {display: none}
img {vertical-align: middle;}

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
.row {margin: 10 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */

.card {
  box-shadow: 0 4px 8px  rgba(0, 0, 0, 0.2);
  padding: 8px;
  text-align: center;
  background-color: #f1f1f1;
}
/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;

.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 	
  to {opacity: 1}
}
@media screen and (max-width: 300px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
    .prev, .next,.text {font-size: 11px}
  }
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="main.php">Event Management System</a>
  <div class="ind" style="float: right;">
  	 <a colspan="8"  style="float: right;" href="index.html">Logout</a>
  	 <a class="ind" style="float: right;"><?php session_start();echo $_SESSION['email'];?>
  	 <a href="review.html" style="float: right;">Review</a>
  </div>
</div>
<br>
<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="image4.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="image5.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src ="image6.jpg" style="width:100%">
</div>

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
</body>
</body>
</html>

<?php
	$count=0;
	$db=mysqli_connect("localhost","admin","admin","ems");

	if(mysqli_connect_error())
      die ("There is no database :(");

   $query="SELECT * FROM event";

   $result=mysqli_query($db,$query);

   if (mysqli_num_rows($result) > 0) 
   {
    	while($row = mysqli_fetch_assoc($result)) 
    	{
    		$count=$count+1;
        	?>
        	<div class="row">
			  <div class="column">
			    <div class="card">
			      <h3><?php echo $row["eventname"] ?></h3>
			      <p><?php echo $row["eventhostname"]?></p>
			      <p><?php echo $row["eventvenue"]?></p>
			      <p><?php echo "Price : ₹".$row["price"]?></p>
			      <p> <div  input type = "submit" name="submit">
						<button class="button"  >
							<a href="view.php?inid=<?php echo htmlentities($row['eventid']); ?>"> View </a> 
						</button>
						
						<button class="button">
							<a href="book.php?inid=<?php echo htmlentities($row['eventid']); ?>"t>Book ticket</a> 
						</button>
					</div></p>
			    </div>
			  </div>

		<?php
    	}
    	
	} 
	else 
	{
    	echo "0 results";
	}

mysqli_close($db);
?>
