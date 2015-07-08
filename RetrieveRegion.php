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
$result=mysqli_query($con,"Select R.TechName,PplAffected,Death,IdealTempInCel,Population from Region R,DisInfo D,Carrier C where CName=C.Name AND Country='$_POST[country]' AND State='$_POST[state]' AND City='$_POST[city]' AND R.TechName=D.TechName");
if($row=mysqli_fetch_array($result))
{
	echo "<b>Disease in the region are:</b>";
	$back="Home";
        $back=$back.".html";
        echo "<p align=".right."><a href=".$back.">Home</a></p><br><br>";
	echo "&bull;  <b>".$row['TechName']."</b><br><br>";
	echo '<table style="width:700px">';
	echo '<tr>';
	echo "<td><b><label>People Affected</label></b></td>";
        echo "<td><b><label>Deaths</label></b></td>";
	echo "<td><b><label>Ideal Temperature For Carrier(C)</label></b></td>";
	echo "<td><b><label>People Affected in the Region</label></b><br>";
	echo '</tr>';
	echo '<tr>';
	echo "<td>".$row['PplAffected']."</td>";
	echo "<td>".$row['Death']."</td>";
	echo "<td>".$row['IdealTempInCel']."</td>";
	echo "<td>".$row['Population']."</td>";
	echo '</tr>';
	echo "</table>";
	$vac=mysqli_query($con,"Select Name from Vaccine where TechName='".$row['TechName']."'");
	if($row=mysqli_fetch_array($vac))
	{
		echo "<br>Medication available:<br><br>";
		echo '<table style="width:90px">';
		echo '<tr>';
		echo "<td><b><label>Name</label></b></td>";
		echo '</tr>';
		echo '<tr>';
		echo "<td>".$row['Name']."</td>";
		echo '</tr>';
		while($row=mysqli_fetch_array($vac))
		{
			echo '<tr>';
                	echo "<td>".$row['Name']."</td>";
                	echo '</tr>';
		}
		echo "</table>";
	}
	while($row=mysqli_fetch_array($result))
	{
		echo "<br><br>&bull;  <b>".$row['TechName']."</b><br><br>";
        	echo '<table style="width:700px">';
        	echo '<tr>';
        	echo "<td><b><label>People Affected</label></b></td>";
        	echo "<td><b><label>Deaths</label></b></td>";
        	echo "<td><b><label>Ideal Temperature For Carrier(C)</label></b></td>";
		echo "<td><b><label>People Affected in the Region</label></b><br>";
        	echo '</tr>';
        	echo '<tr>';
        	echo "<td>".$row['PplAffected']."</td>";
        	echo "<td>".$row['Death']."</td>";
        	echo "<td>".$row['IdealTempInCel']."</td>";
		echo "<td>".$row['Population']."</td>";
        	echo '</tr>';
        	echo "</table>";
        	$vac=mysqli_query($con,"Select Name from Vaccine where TechName='".$row['TechName']."'");
        	if($row=mysqli_fetch_array($vac))
        	{
        	        echo "<br>Medication available:<br><br>";
                	echo '<table style="width:90px">';
                	echo '<tr>';
                	echo "<td><b><label>Name</label></b><td>";
                	echo '</tr>';
                	echo '<tr>';
                	echo "<td>".$row['Name']."</td>";
                	echo '</tr>';
                	while($row=mysqli_fetch_array($vac))
                	{
                	        echo '<tr>';
                	        echo "<td>".$row['Name']."</td>";
                	        echo '</tr>';
                	}
                	echo "</table>";
        	}
	}
}
else
{

        echo "No Disease in the region or place does not exist";
        echo '<br><a href="SelectR.html">Try Again</a>';
        die();
}
mysqli_close($con);
?>
<br><br>For more Information about Carriers <a href="Carrier.php">Click</a> Here
<br><br>For more Information about Vaccines <a href="Vaccine.html">Click</a> Here
<br><br>For more Information about Diseases <a href="SelectAlpha.html">Click</a> Here
</body> 
</html>

