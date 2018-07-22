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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<h1><center>Student Information for <?php echo "$course" ?> of year <?php echo "$batch" ?></center></h1>
<form action="pdfstudent_info2.php" method="POST" target="_blank">
<input style="display:none;" type="checkbox" name="batch" value="<?php echo "$batch" ?>" checked>
<input style="display:none;" type="checkbox" name="course" value="<?php echo "$course" ?>" checked>
<input type="submit" value="Donwload PDF">
</form>

<table border id="info" class="nal">
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

</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>