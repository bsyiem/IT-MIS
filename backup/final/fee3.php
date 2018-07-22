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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
include("header.php");
$batch=$_POST['batch'];
$course=$_POST['course'];
$sql=mysql_query("select rollno from student where batch='$batch' and course = '$course'",$conn);
while($res=mysql_fetch_array($sql))
{
	if(isset($_POST["$res[0]"]) && $_POST["$res[0]"]=='yes')
	{
		mysql_query("update fee set payed = 'yes' where rollno = '$res[0]'",$conn);
	}
	else
	{
		mysql_query("update fee set payed = 'no' where rollno = '$res[0]'",$conn);
	}
}
echo "<br><br>";
echo "<h2><center>Changes have been saved</center></h2>";
echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
mysql_close();
include("footer.php");
?>
</body>
</html>