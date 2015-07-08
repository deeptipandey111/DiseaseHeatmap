<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
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
	$back="Home";
        $back=$back.".html";
        echo "<p align=".right."><a href=".$back.">Logout</a></p>";
	$inside="Inside";
        $inside=$inside.".html";
        echo "<p align=".right."><a href=".$inside.">Modify/Insert</a></p>";
	if(isset($_POST['deaths']))
		$result=mysqli_query($con,"Update DisInfo set Death=$_POST[dth] where TechName='$_POST[dis]'");
	if(isset($_POST['ppla']))
		$result=mysqli_query($con,"Update DisInfo set PplAffected=$_POST[pla] where TechName='$_POST[dis]'");
	if(isset($_POST['pplc']))
                 $result=mysqli_query($con,"Update DisInfo set PplCured=$_POST[plc] where TechName='$_POST[dis]'");
	echo "Modification Successful<br>";
}
else
{
	$back="Home";
        $back=$back.".html";
        echo "<p align=".right."><a href=".$back.">Logout</a></p>";
        $inside="Inside";
        $inside=$inside.".html";
        echo "<p align=".right."><a href=".$inside.">Modify/Insert</a></p>";
	echo "Disease does not exist<br>";
        echo '<a href="ModifyDis.html">Try Again</a>';
        die();
}
mysqli_close($con);
?> 
<br>Go <a href="Inside.html">back</a> to modify data<br>
</body></html>

