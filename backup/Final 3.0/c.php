<?php
include_once("db.php");
if(isset($_POST['add']))
{
	header("Location:sign_up.php");
	exit;
}
?>
<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
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
<?php
if(isset($_POST['save']))
{
	$sql=mysql_query("select count(*) from user",$conn);
	$result=mysql_result($sql,0);
	$c=0;
	while($c<$result-1)
	{
		$s=0;
		$sq=mysql_query("select username from user where username!=\"admin\"",$conn);
		$e=mysql_result($sq,$c);
		$res=mysql_real_escape_string($e);
		$ares=strtr($res,"@.","__");
		if(isset($_POST["1_$ares"])&& $_POST["1_$ares"] == 'yes')
		{
			$sql=mysql_query("update `user` set `student_view` = 'yes' where username = '$res'",$conn);
		}
		else
		{
			$sql=mysql_query("update `user` set `student_view` = 'no' where username = '$res'",$conn);
		}
		if(isset($_POST["2_$ares"])&& $_POST["2_$ares"] == 'yes')
		{
			$sql=mysql_query("update `user` set `teacher_view` = 'yes' where username = '$res'",$conn);
		}
		else
		{
			$sql=mysql_query("update `user` set `teacher_view` = 'no' where username = '$res'",$conn);
		}
		if(isset($_POST["3_$ares"])&& $_POST["3_$ares"] == 'yes')
		{
			$sql=mysql_query("update `user` set `clerk_view` = 'yes' where username = '$res'",$conn);
		}
		else
		{
			$sql=mysql_query("update `user` set `clerk_view` = 'no' where username = '$res'",$conn);
		}
		if(isset($_POST["4_$ares"])&& $_POST["4_$ares"] == 'yes')
		{
			$sql=mysql_query("update `user` set `admin_view` = 'yes' where username = '$res'",$conn);
		}
		else
		{
			$sql=mysql_query("update `user` set `admin_view` = 'no' where username = '$res'",$conn);
		}
		$c+=1;
	}
	echo "<br><br>";
	echo "<h2><center>Changes have been saved....</center></h2>";
	echo "<br><br><br><br><br><br><br><br><br><br>";
}
if(isset($_POST['delete']))
{
	$sql=mysql_query("select count(*) from user",$conn);
	$result=mysql_result($sql,0);
	$c=0;
	while($c<$result)
	{
		$s=0;
		$sq=mysql_query("select username from user",$conn);
		$e=mysql_result($sq,$c);
		$res=mysql_real_escape_string($e);
		$ares=strtr($res,"@.","__");
		if(isset($_POST[$ares])&& $_POST[$ares] == 'yes')
		{
				$s=1;
				$result-=1;
				$sql=mysql_query("delete from user where username = '$res'",$conn);
		}
		if($s==0)
		{
			$c+=1;
		}
	}
	echo "<br><br>";
	echo ("<h2><center>Records have been succesfully deleted.....</center></h2>");
	echo "<br><br><br><br><br><br><br><br><br><br>";
}
mysql_close($conn);
?>
</div></div>
<?php
include("footer.php");
?>
</div>
</body>
</html>