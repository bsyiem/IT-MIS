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
<title>Repeater Management</title>
<script src="chk_empty.js"></script>
<script src="and.js"></script>
</head>
<body>
<h1>Repeater Management</h1>
<br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
?>
</div><br><br>
<hr width="100%">
<form name="form1" method="post" action="repeateradd1.php" onsubmit="return an(chk_empty(&quot;rollno&quot;),chk_empty(&quot;scode&quot;));">
Enter Roll Number: <input type="textbox" name="rollno" id="rollno"><br>
Enter Subject Code: <input type="textbox" name="scode" id="scode"><br>
Enter Revision year for subject: <select name="revision_year">
<?php 
	$sql=mysql_query("select distinct revision_year from subject",$conn);
	while($res=mysql_fetch_array($sql))
	{
		echo "<option value=\"$res[0]\">".$res[0]."</option>";
	}
?></select><br>
<input type="submit" value="Insert">
</form>
</body>
</html>
