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
$sql="INSERT INTO Vaccine VALUES ('$_POST[dis]','$_POST[nam]','$_POST[type]','$_POST[efftime]')";
if (!mysqli_query($con,$sql))
  	{
		echo "Medication already exists OR entered disease does not exist<br><br>";
		echo '<a href="InsertVac.html">Try Again</a>';
  		die();
  	}
echo "Insertion Successful<br>";
mysqli_close($con);
?> 
</body></html>

