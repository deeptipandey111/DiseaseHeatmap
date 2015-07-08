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
$sql="DELETE FROM Vaccine WHERE TechName='$_POST[dis]' AND Name='$_POST[med]'";
if (!mysqli_query($con,$sql))
  	{
		echo "Medication/Disease does not exist<br>";
		echo '<a href="DelVac.html">Try Again</a>';
  		die();
  	}
echo "Deletion Successful<br>";
mysqli_close($con);
?>
</body></html>

