<?php
include_once "db.php";
include_once "checker.php";
$batch1=$_POST['batch'];
$batch1 = strtok($batch1," ");
$batch=$batch1;
$batch1=strtok(" ");
$course=$batch1;
?>
<html>
<head>
<title>Student Information</title>
<style>
#info
{
	border-bottom-width:medium;
	border-color:#000000;
	border-collapse:collapse;
}
th
{
	background-color:#0000CC;
	color:#FFFFFF;
}
</style>
</head>
<body>
<h1>Student Information</h1>
<br>
for <?php echo "$course" ?> of year <?php echo "$batch" ?><br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
?>
</div><br><br>
<hr>
<form action="pdfstudent_info2.php" method="POST">
<input style="display:none;" type="checkbox" name="batch" value="<?php echo "$batch" ?>" checked>
<input style="display:none;" type="checkbox" name="course" value="<?php echo "$course" ?>" checked>
<input type="submit" value="Donwload PDF">
</form>
<table border id="info">
<tr><th>Roll Number</th><th>First Name</th><th>Last Name</th></tr>
<?php
$sql=mysql_query("select * from student where batch='$batch' and course='$course'",$conn);
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	echo "<tr>";
	echo "<td>$res[0]</td>";
	echo "<td>$res[4]</td>";
	echo "<td>$res[5]</td>";
	echo "</tr>";
}
mysql_close($conn);
?>
</table>
</body>
</html>