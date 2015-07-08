<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
<body>
<form method="post" action="RetrieveAlpha.php">
<center><u>Diseases</u></center><br>
<p align="right"><a href="Home.html">Home</a></p>
<label>List of diseases starting from M:<br><br>
<select id="Choice" name="Choice">
<?php
$con=mysqli_connect("localhost","root","root","Health");
if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
$result = mysqli_query($con,"SELECT TechName FROM DisInfo WHERE TechName LIKE 'm%'");
while($row = mysqli_fetch_array($result))
        {
                $tn=$row['TechName'];
                echo "<option value=\"$tn\">".$row['TechName']."</option>";
        }
mysqli_close($con);
?>
</select>
<br><br>
<input type="submit" value="Details"/>
</form>
</body>
</html>

