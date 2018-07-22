<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0 && $cv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>
<title>Fee</title>
</head>

<body>
<h1>Fee Information</h1>
<br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
$batch1=$_POST['batch'];
$batch=strtok($batch1," ");
$course=strtok(" ");

?>
</div><br><br>
<hr>
<?php echo "Students of Batch: $batch $course"; ?>
<form action="fee3.php" method="post">
<?php
	echo "<input type=\"hidden\" value = \"$batch\" name=\"batch\">";
	echo "<input type=\"hidden\" value = \"$course\" name=\"course\">";
?>
<table border>
<tr><th>Roll No</th><th>Name</th><th>Fee status</th></tr>
<?php
	$sql=mysql_query("select rollno,fname,lname from student where batch='$batch' and course='$course'",$conn);
	while($res=mysql_fetch_array($sql))
	{
		$sql1=mysql_query("select count(*) from fee where rollno='$res[0]'",$conn);
		$chkpresent=mysql_result($sql1,0);
		if($chkpresent==0)
		{
			mysql_query("insert into fee(rollno) values('$res[0]')",$conn);
		}
		$sql2=mysql_query("select payed from fee where rollno='$res[0]'",$conn);
		$chkpayed=mysql_result($sql2,0);
		if($chkpayed=='yes')
		{
			echo "<tr><td>".$res[0]."</td><td>".$res[1]." ".$res[2]."</td><td><input type=\"checkbox\" value=\"yes\" name = \"".$res[0]."\" checked></td></tr>";
		}
		else
		{
			echo "<tr><td>".$res[0]."</td><td>".$res[1]." ".$res[2]."</td><td><input type=\"checkbox\" value=\"yes\" name = \"".$res[0]."\"></td></tr>";
		}
	}
mysql_close();
?>
</table><br>

<input type="submit" value="Save">
<body>

</body>
</html>
