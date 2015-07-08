<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
<body>
<p align="right"><a href="Home.html">Logout</a></p>
<?php
$con=mysqli_connect("localhost","root","root","Identification");
if(mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
$sql="INSERT INTO UIDPas (ID,Password) VALUES ('$_POST[uname]','$_POST[pass]')";
if (!mysqli_query($con,$sql))
  	{
		echo "Account name already exists OR illegal values were entered<br>";
		echo '<a href="Verify.html">Try Again</a>';
  		die();
  	}
echo "Registration successfully completed<br>";
mysqli_close($con);
?> 
<br><a href="Inside.html">Continue</a><br>
</body></html>

