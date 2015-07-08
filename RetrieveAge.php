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
$Option = isset($_POST['Choice']) ? $_POST['Choice'] : false;
$result = mysqli_query($con,"SELECT * FROM DisInfo WHERE TechName='".$Option."'");
if($row=mysqli_fetch_array($result))
{
	echo "<h4>Details about: $Option</h4>";
	$back="Home";
        $back=$back.".html";
        echo "<p align=".right."><a href=".$back.">Home</a></p><br>";
	echo '<table style="width:200px">';
	echo '<tr>';
	echo "<td><b><label>People Affected</label></b></td>";
        echo "<td>".$row['PplAffected']."</td>";
	echo '</tr>';
	echo "</table>";
}
$result = mysqli_query($con,"SELECT Symptom FROM Symptoms WHERE TechName='".$Option."'");
echo "<br><label>Symptoms:</label><br><br>";
echo '<table style="width:85px">';
echo '<tr>';
echo "<td><b><label>Symptom</label></b></td>";
echo '</tr>';
while($row=mysqli_fetch_array($result))
{
	echo '<tr>';
	echo "<td>".$row['Symptom']."</td>";
	echo '</tr>';
}
echo "</table>";
$vac=mysqli_query($con,"Select Name from Vaccine where TechName='".$Option."'");
        if($row=mysqli_fetch_array($vac))
        {
                echo "<br>Medication available:<br><br>";
		echo '<table style="width:100px">';
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
mysqli_close($con);
?>
<br><br>For more Information about Carriers <a href="Carrier.php">Click</a> Here
<br><br>For more Information about Vaccines <a href="Vaccine.html">Click</a> Here
<br><br>For more Information about Diseases <a href="SelectAlpha.html">Click</a> Here
</body>
</html>
