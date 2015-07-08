<html>
<body>
<style>

body

{

background-color:#b0c4de;

}

</style>
<p align="right"><a href="Home.html">Logout</a></p>
<p align="right"><a href="Inside.html">Modify/Insert</a></p>
<?php
$con=mysqli_connect("localhost","root","root","Health");
if(mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
$result=mysqli_query($con,"Update Region set Population=$_POST[pop] where TechName='$_POST[dis]' AND Country='$_POST[count]' AND State='$_POST[state]' AND City='$_POST[city]'");
if (!$result)
        {
                echo "Specified region is not affected by any disease OR does not exist<br>";
                echo '<a href="ModifyPop.html">Try Again</a>';
                die();
        }
echo "Modification Successful<br>";
mysqli_close($con);
?> 
<br>Go <a href="Inside.html">back</a> to modify data<br>
</body>
</html>

