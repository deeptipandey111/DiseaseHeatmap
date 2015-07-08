<?php
$file1 = "./Output.txt";
$lines = file($file1);
foreach($lines as $line_num => $line)
{
$ret=explode(' ',$line);
$id=$ret[0];
$country=$ret[1];
echo "<br>";
}
?>
