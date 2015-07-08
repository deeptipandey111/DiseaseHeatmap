<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
<body>
<p align="right"><a href="Home.html">Logout</a></p>
<p align="right"><a href="Inside.html">Modify/Insert</a></p>
<?php
$con=mysqli_connect("localhost","root","root","Health");
if(mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
$sql="INSERT INTO Carrier VALUES ('$_POST[nam]','$_POST[type]','$_POST[size]','$_POST[rep]','$_POST[temp]')";
if (!mysqli_query($con,$sql))
  	{
		echo "Carrier already exists<br>";
		echo '<a href="InsertCar.html">Try Again</a>';
  		die();
  	}
echo "Insertion Successful<br>";
mysqli_close($con);
?> 
</body></html>

