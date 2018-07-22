<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0)
{
	header("location:index.php");
	exit;
}
$sem1=$_POST['sem'];
$sem=strtok($sem1," ");
$course=strtok(" ");
$revision_year=$_POST['revision_year'];

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
<div id="center">
<form method="post" action="teachermgt2.php">
<input type="checkbox" style = "display:none;" name = "revision_year" value ="<?php echo $revision_year; ?>" checked>
<input type="checkbox" style = "display:none;" name = "sem" value ="<?php echo $sem; ?>" checked>
<input type="checkbox" style = "display:none;" name = "course" value ="<?php echo $course; ?>" checked>
<div id="tbscroll">
<table  border class="nal">
<tr><th>Teacher ID</th><th>Teacher Name</th>
<?php
	$sql=mysql_query("select scode,sname from subject where course='$course' and revision_year='$revision_year' and sem='$sem'",$conn);
	
	while($res=mysql_fetch_array($sql))
	{
		echo "<th>".$res[1]."(".$res[0].")</th>";
	} 
	echo "</tr>";
	$sql1=mysql_query("select eid,efname,elname from employee where category='teaching'",$conn);
	while($res1=mysql_fetch_array($sql1))
	{
		echo "<tr><td>".$res1[0]."</td><td>".$res1[1]." ".$res1[2]."</td>";
		$sql2=mysql_query("select scode,sname from subject where course='$course' and revision_year='$revision_year' and sem='$sem'",$conn);
		while($res2=mysql_fetch_array($sql2))
		{
			$chkteaches=mysql_num_rows(mysql_query("select * from teaches where eid='$res1[0]' and scode='$res2[0]' and revision_year='$revision_year'",$conn));
			//$scode=strtr($res2[0],"-","_");
			if($chkteaches>0)
			{
				echo "<td><input type=\"checkbox\" value=\"yes\" name=\"name".$res1[0]."_".$res2[0]."_".$revision_year."\" checked></td>";
			}
			else 
			{
				echo "<td><input type=\"checkbox\" value=\"yes\" name=\"name".$res1[0]."_".$res2[0]."_".$revision_year."\"></td>";
			}
		}
		echo "</tr>";
	}
?>
</table>
<input type="submit" value="Go"></div>
</form>
</div></div>
<br><br><br>
<?php
include("footer.php");
?>
</div>
</body>
</html>