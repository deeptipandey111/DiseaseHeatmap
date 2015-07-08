<?php
session_start();
$con=mysqli_connect("localhost","root","root","Health");
if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
$Option = isset($_POST['Choice']) ? $_POST['Choice'] : false;
$result = mysqli_query($con,"SELECT * FROM DisInfo WHERE TechName='".$Option."'");
$row=mysqli_fetch_array($result);
$_SESSION['Carrier']=$row['CName'];
mysqli_close($con);
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
$Option = isset($_POST['Choice']) ? $_POST['Choice'] : false;
$result = mysqli_query($con,"SELECT * FROM DisInfo WHERE TechName='".$Option."'");
if($row=mysqli_fetch_array($result))
{
	echo "<h4>Details about: $Option</h4>";
	$back="Home";
        $back=$back.".html";
        echo "<p align=".right."><a href=".$back.">Home</a></p><br>";
	echo '<table style="width:400px">';
	echo '<tr>';
	echo "<td><b><label>People Affected</label></b></td>";
        echo "<td><b><label>People Cured</label></b></td>";
	echo "<td><b><label>Carrier Name</label></b></td>";
	echo '</tr>';
	echo '<tr>';
	echo "<td>".$row['PplAffected']."</td>";
	echo "<td>".$row['PplCured']."</td>";
	$link="CarIn";
	/*$link=str_replace(' ','_',$link);
	$link=str_replace('(','',$link);
	$link=str_replace(')','',$link);*/
	$link=$link.".php";
	echo "<td><a href=".$link.">".$row['CName']."</a></td>";
	echo '</tr>';
	echo "</table>";
}
$result = mysqli_query($con,"SELECT Symptom FROM Symptoms WHERE TechName='".$Option."'");
echo "<br><label>Symptoms:</label><br><br>";
echo '<table style="width:100px">';
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
$result = mysqli_query($con,"SELECT Country,State,City FROM Region WHERE TechName='".$Option."'");
if($row=mysqli_fetch_array($result))
{
        echo "<br><label>Region Affeted: </label>";
        echo $row['City'].",";
        echo $row['State'].",";
        echo $row['Country']."<br><br>";
	echo "For more Diseases based on Regions ";
	$link="SelectR.html";
	echo "<a href=".$link.">".click."</a> here";
}
mysqli_close($con);
?>
</body>
</html>
