<?php
session_start(); 
include_once "db.php";
include_once "checker.php";
if($av==0)
{
	header("location:index.php");
	exit;
}
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
<form method="post" action="teachermgt1.php">
<div id="tbscroll">
<table width = "60%" class="nal">
<tr>
<td>
Enter Semester and Course:
<select name="sem">
<?php
$sql=mysql_query("select sem,course from semester where sem < 9",$conn);
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	
	echo "<option value=\"".$res[0]." ".$res[1]."\">".$res[0]."(".$res[1].")</option>";
}
?>
</select>
</td>
<td>
Enter Course Revision Year:
<select name="revision_year">
<?php
$sql=mysql_query("select distinct(revision_year) from subject",$conn);
while($res=mysql_fetch_array($sql,MYSQL_NUM))
{
	
	echo "<option value=\"".$res[0]."\">".$res[0]."</option>";
}
mysql_close();
?>
</select>
</td>
</tr>
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