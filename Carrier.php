<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
<body>
<form method="post" action="RetrieveCar.php">
<center><u>Carrier details</u></center>
<p align="right"><a href="Home.html">Home</a></p>
<br><br><label>Select Carrier:<br><br>
<select id="Choice" name="Choice">
<?php
$con=mysqli_connect("localhost","root","root","Health");
if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
$result = mysqli_query($con,"SELECT Name FROM Carrier");
while($row = mysqli_fetch_array($result))
        {
                $tn=$row['Name'];
                echo "<option value=\"$tn\">".$row['Name']."</option>";
        }
mysqli_close($con);
?>
</select>
<br><br>
<input type="submit" value="Details"/>
</form>
</body>
</html>

