<?php
if(isset($_SESSION['username']))
{
	$user=$_SESSION['username'];
	$sql0=mysql_query("select count(*) from user where (username='$user')and (student_view='yes')",$conn);
	$sv=mysql_result($sql0,0);
	$sql1=mysql_query("select count(*) from user where (username='$user')and (teacher_view='yes')",$conn);
	$tv=mysql_result($sql1,0);
	$sql2=mysql_query("select count(*) from user where (username='$user')and (clerk_view='yes')",$conn);
	$cv=mysql_result($sql2,0);
	$sql3=mysql_query("select count(*) from user where (username='$user')and (admin_view='yes')",$conn);
	$av=mysql_result($sql3,0);
}
else
{
	$sv=0;
	$tv=0;
	$cv=0;
	$av=0;
}
?>