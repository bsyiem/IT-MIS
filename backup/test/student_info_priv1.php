<?php
session_start();
include_once "db.php";
include_once "checker.php";
if($av==0 && $cv==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$att=NULL;
$batch1=$_POST['batch'];
$batch1 = strtok($batch1," ");
$batch=$batch1;
$batch1=strtok(" ");
$course=$batch1;
for($i=0;$i<24;$i++)
{
	if(isset($_POST[$i]))
	{
		$att.=$_POST[$i].',';
	}
}
$att=substr($att,0,-1);
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
<div><p style="float:left;"><a href = "index.php">Menu</a></p><p style="float:right;"><a href = "logout.php">logout</a></p></div><br><br>
<hr>
<table><tr><td>
<form action="pdfstudent_info2.php" method="POST">
<input style="display:none;" type="checkbox" name="batch" value="<?php echo "$batch" ?>" checked>
<input style="display:none;" type="checkbox" name="course" value="<?php echo "$course" ?>" checked>
<input type="submit" value="Donwload Simplified PDF">
</form>
</td>
<td>
<form action="pdfstudent_info1.php" method="POST">
<input style="display:none;" type="checkbox" name="batch" value="<?php echo "$batch" ?>" checked>
<input style="display:none;" type="checkbox" name="course" value="<?php echo "$course" ?>" checked>
<input type="submit" value="Donwload Detailed PDF">
</form>
</td>
<td>
<form action="csvstudent_info1.php" method="POST">
<input style="display:none;" type="checkbox" name="batch" value="<?php echo "$batch" ?>" checked>
<input style="display:none;" type="checkbox" name="course" value="<?php echo "$course" ?>" checked>
<input type="submit" value="Donwload CSV">
</form>
</td></tr>
</table>
<table border id="info">
<!--<tr><th>Roll Number</th><th>Student ID Number</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>Date_of_Birth (yyyy/mm/dd)</th><th>Permanent Address</th><th>Mailing Address</th><th>Contact number</th><th>Email ID</th><th>Father's Name</th><th>Mother's Name</th><th>Guardian's Name</th><th>Guardian's Contact</th><th>Guardian's Email ID</th><th>Blood Group</th><th>Nationality</th><th>Religion</th><th>Caste</th><th>Marital Status</th><th>Registration Number</th><th>Year of Registration</th></tr>-->
<?php
for($i=0;$i<24;$i++)
{
	if(isset($_POST[$i]))
	{
		echo "<th>$_POST[$i]</th>";
	}
}
$sql=mysql_query("select $att from student where batch='$batch' and course='$course'",$conn);
if($sql!=false)
{
	while($res=mysql_fetch_array($sql,MYSQL_NUM))
	{
		echo "<tr>";
		foreach($res as $item)
		{
			echo "<td>$item</td>";
		}
		echo "</tr>";
	}
}
else
{
	echo "No attribute selected!";
}
mysql_close($conn);
?>
</table>
</body>
</html>