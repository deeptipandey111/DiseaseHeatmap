<html>
<style>

body

{

background-color:#b0c4de;

}

</style>
<body>
<center><u>Age Group: 2-10</u></center><br>
<p align="right"><a href="Home.html">Home</a></p>
<form method="post" action="RetrieveAge.php">
<?php
$con=mysqli_connect("localhost","root","root","Health");
if (mysqli_connect_errno())
        {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
$result = mysqli_query($con,"SELECT TechName FROM AgeGrp WHERE A2_10 !=''");
if($row=mysqli_fetch_array($result))
{
        echo "<label>Diseases affecting kids of age group 2-10:<br><br>";
        echo "<select id=".Choice." name=".Choice.">";
        $tn=$row['TechName'];
        echo "<option value=\"$tn\">".$row['TechName']."</option>";
        while($row = mysqli_fetch_array($result))
        {
                $tn=$row['TechName'];
               echo "<option value=\"$tn\">".$row['TechName']."</option>";
        }
}
else
{

        echo "No Disease in the age group";
        echo '<br><a href="SelectAge.html">Try Again</a>';
        die();
}
mysqli_close($con);
?>
</select>
<br><br>
<input type="submit" value="Details"/>
</form>
</body>
</html>

