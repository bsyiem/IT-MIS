<?php
session_start();
include_once("db.php");
include_once("checker.php");
if($av!=1)
{
	header("location:login.php");
	exit;
}
?>
<html>
<head>
<title>Access Control</title>
<script>
function con()
{
	var x=confirm("Are you sure you wish to delete the selected users?");
	return x;
}
</script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>
<H2 align = "center">Privilege Controls</H2>
<form action="c.php" method="post">
<table border align = "center" class="nal">
<tr><th>SELECT</th><th>USERNAME</th><th>STUDENT_VIEW</th><th>TEACHER_VIEW</th><th>CLERK_VIEW</th><th>ADMIN_VIEW</th></tr>
<?php
$i=0;
$sql=mysql_query("select count(*) from user",$conn);
$result=mysql_result($sql,0);
while ($i<$result)
{
	$sq=mysql_query("select username from user",$conn);
	$e=mysql_result($sq,$i);
	$res=mysql_real_escape_string($e);
	if($res=="admin")
	{
		$i+=1;
		continue;
	}
	$ares=strtr($res,"@.","__");
	include("b.php"); 
	$i+=1;
}
mysql_close($conn);
?>
</table>
<br>
<div align = "center">
<input type="submit" name="save" value="Save Changes">&nbsp;
<input type="submit" name="add" value="Add A User">&nbsp;
<input type="submit" name="delete" value="Delete Selected Users" onclick="return con()">
</div>
</form>
<?php
include("footer.php");
?>
</body>
</html>