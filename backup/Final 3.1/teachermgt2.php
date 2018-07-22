<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0)
{
	header("location:index.php");
	exit;
}
$course=$_POST['course'];
$revision_year=$_POST['revision_year'];
$sem=$_POST['sem'];
?>
<html>
<head> 
<title>Teacher Management</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="main_container">
<?php
include("header.php");
?>
<h1><center>Teacher Management</center></h1>
<div id="main_body">
<div id="left_menu">
<?php
include("menu.php");
?>
</div>
<div id="body">
<?php
	$sql=mysql_query("select eid from employee where category='teaching'",$conn);
	while($res=mysql_fetch_array($sql))
	{
		$sql1=mysql_query("select scode from subject where course='$course' and revision_year='$revision_year' and sem='$sem'",$conn);
		while($res1=mysql_fetch_array($sql1))
		{
			if(isset($_POST["name$res[0]_$res1[0]_$revision_year"])&& $_POST["name$res[0]_$res1[0]_$revision_year"]=='yes')
			{
				$chkteaches=mysql_num_rows(mysql_query("select * from teaches where eid='$res[0]' and scode='$res1[0]' and revision_year='$revision_year'",$conn));
				
				if($chkteaches==0)
				{
					mysql_query("insert into teaches values('$res[0]','$res1[0]','$revision_year')",$conn);
				}
			}
			else
			{
				mysql_query("delete from teaches where eid='$res[0]' and scode='$res1[0]' and revision_year='$revision_year'",$conn);
			}
		}
	}
	echo "<h2 align=\"center\">Changes have been saved</hr>";
	mysql_close();
?>
</div></div>
<?php
include("footer.php");
?>
</div>
</body>
</html>
