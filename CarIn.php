<?php
session_start();
?>
<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
<head>
<style>
table,th,td
{
border:1px solid black;
}
</style>
</head>
<body>
<?php
$con=mysqli_connect("localhost","root","root","Health");
if (mysqli_connect_errno())
 	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
$Option = isset($_SESSION['Carrier']) ? $_SESSION['Carrier'] : false;
$result = mysqli_query($con,"SELECT * FROM Carrier WHERE Name='".$Option."'");
if($row=mysqli_fetch_array($result))
{
	echo "<h4>Details about: $Option</h4>";
	$back="Home";
	$back=$back.".html";
	echo "<p align=".right."><a href=".$back.">Home</a></p><br>";
	echo '<table style="width:750px">';
	echo '<tr>';
	echo "<td><b><label>Type</label></b></td>";
       	echo "<td><b><label>Size(nm)</label></b></td>";
	echo "<td><b><label>Rate Of Reproduction(/s)</label></b></td>";
	echo "<td><b><label>Ideal Temperature for Reproduction(C)</label></b></td>";
	echo '</tr>';
	echo '<tr>';
	echo "<td>".$row['Type']."</td>";
	echo "<td>".$row['SizeInNanoMeter']."</td>";
	echo "<td>".$row['RepRatePerSec']."</td>";
	echo "<td>".$row['IdealTempInCel']."</td>";
	echo '</tr>';
	echo "</table>";
}
$result = mysqli_query($con,"SELECT TechName FROM DisInfo WHERE CName='".$Option."'");
if($row=mysqli_fetch_array($result))
{
	echo "<br><br><br><label>Diseases caused:</label><br><br>";
	echo '<table style="width:85px">';
	echo '<tr>';
	echo "<td><b><label>Name</label></b></td>";
	echo '</tr>';
	echo '<tr>';
        echo "<td>".$row['TechName']."</td>";
        echo '</tr>';
	while($row=mysqli_fetch_array($result))
	{
		echo '<tr>';
		echo "<td>".$row['TechName']."</td>";
		echo '</tr>';
	}
	echo "</table>";
}
mysqli_close($con);
session_destroy();
?>
<br><br>For more information about Diseases <a href="SelectAlpha.html">Click</a> here
</body>
</html>
