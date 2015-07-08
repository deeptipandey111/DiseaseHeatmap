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
if (mysqli_connect_errno())
  	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
$result = mysqli_query($con,"SELECT * FROM UIDPas WHERE ID='$_POST[uname]' AND Password='$_POST[pass]'");
if($row = mysqli_fetch_array($result))
  	{
		echo "Login Successful<br>";
		echo '<a href="Inside.html">Continue</a>';
		echo "<br>";
  	}
else
	{
		echo "Login Unsuccessful<br>";
		echo '<a href="VerifyLog.html">Click here</a>';
		echo " to go back to Login page<br>";
  	}
mysqli_close($con);
?> 
</body></html>
