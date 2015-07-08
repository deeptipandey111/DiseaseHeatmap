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
$result = mysqli_query($con,"SELECT * FROM DisInfo where Techname='$_POST[nam]'");
if($row=mysqli_fetch_array($result))
{
	echo "Disease already exists<br>";
        echo '<a href="InsertDis.html">Try Again</a>';
        die();
}
$result = mysqli_query($con,"SELECT * FROM Carrier where Name='$_POST[cnam]'");
if($row=mysqli_fetch_array($result)){}
else
{
        echo "Mentioned carrier does not exist<br>";
        echo '<a href="InsertDis.html">Try Again</a>';
	echo "<br>Add ";
	echo '<a href="InsertNew.html">Carrier</a>';
        die();
}
$sql="INSERT INTO DisInfo VALUES ('$_POST[nam]','$_POST[ppla]','$_POST[deaths]','$_POST[cured]','$_POST[cnam]')";
$result=mysqli_query($con,$sql);
$sql="INSERT INTO Region VALUES ('$_POST[nam]','$_POST[cont]','$_POST[count]','$_POST[state]','$_POST[city]','$_POST[pop]')";
$result=mysqli_query($con,$sql);
if("" == trim($_POST['sym1'])){}
else
{
	$sql="INSERT INTO Symptoms VALUES ('$_POST[nam]','$_POST[sym1]')";
	$result=mysqli_query($con,$sql);
}
if("" == trim($_POST['sym2'])){}
else
{
        $sql="INSERT INTO Symptoms VALUES ('$_POST[nam]','$_POST[sym2]')";
        $result=mysqli_query($con,$sql);
}
if("" == trim($_POST['sym3'])){}
else
{
        $sql="INSERT INTO Symptoms VALUES ('$_POST[nam]','$_POST[sym3]')";
        $result=mysqli_query($con,$sql);
}
$sql="INSERT INTO AgeGrp VALUES ('$_POST[nam]','$_POST[age0]','$_POST[age2]','$_POST[age10]','$_POST[age25]','$_POST[age60]')";
$result=mysqli_query($con,$sql);
echo "Insertion Successful<br>";
mysqli_close($con);
?> 
</body></html>

