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
if(mysqli_connect_errno())
	{
  		echo "Failed to connect to MySQL: " . mysqli_connect_error();
  	}
$result=mysqli_query($con,"Select * from DisInfo where TechName='$_POST[dis]'");
if($row=mysqli_fetch_array($result))
{
	$result2=mysqli_query($con,"Select * from Vaccine where TechName='$_POST[dis]'");
	if($row=mysqli_fetch_array($result2))
	{
		echo "<b>Medication available for $_POST[dis]:</b>";
		$back="Home";
        	$back=$back.".html";
        	echo "<p align=".right."><a href=".$back.">Home</a></p><br><br>";
		echo "&bull;  <u>".$row['Name']."</u><br><br>";
		echo '<table style="width:250px">';
		echo '<tr>';
		echo "<td><b><label>Type</label></b></td>";
        	echo "<td><b><label>Duration(Days)</label></b></td>";
		echo '</tr>';
		echo '<tr>';
		echo "<td>".$row['Type']."</td>";
		echo "<td>".$row['EffTime']."</td>";
		echo '</tr>';
		echo "</table>";
		while($row=mysqli_fetch_array($result2))
		{
			echo "<br><br>&bull;  <u>".$row['Name']."</u><br><br>";
                	echo '<table style="width:250px">';
                	echo '<tr>';
                	echo "<td><b><label>Type</label></b></td>";
                	echo "<td><b><label>Duration(Days)</label></b></td>";
                	echo '</tr>';
                	echo '<tr>';
                	echo "<td>".$row['Type']."</td>";
                	echo "<td>".$row['EffTime']."</td>";
                	echo '</tr>';
                	echo "</table>";
		}
	}
	else
	{
		echo "No Medication for the Disease";
        	echo '<br><a href="Vaccine.html">Try Again</a>';
        	die();
	}
}
else
{

        echo "No disease by the entered name exists";
        echo '<br><a href="Vaccine.html">Try Again</a>';
        die();
}
mysqli_close($con);
?>
<br><br>For more Information about diseases <a href="SelectAlpha.html">Click</a> Here
</body> 
</html>

