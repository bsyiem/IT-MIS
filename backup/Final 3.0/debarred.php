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
<title>Debarred Students Information</title>
<script src="chk_empty.js"></script>
<script src="and.js"></script>
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
<div id="center">
<form method="post" action="debarred2.php">
<h1>Debarred Students Information</h1>
<div class="inset">
<p><label for="view">To View and Edit the Debarred Students click</label></p> 
</div>
<p class="p-container">
<span><input type="submit" value="View"></span></p><br>
</form>

<form name="form1" method="post" action="debarred1.php" onsubmit="return an(chk_empty(&quot;rollno&quot;),chk_empty(&quot;scode&quot;));">
<h1>To Enter New Debarred Student</h1>
<div class="inset">
<p><label for="rollno">Enter Roll Number</label> <input type="text" name="rollno" id="rollno"></p>
<p><label for="scode">Enter Subject Code</label><input type="text" name="scode" id="scode"></p>
<p><label for="revision_year">Enter Revision year for subject</label><select name="revision_year">
<?php 
	$sql=mysql_query("select distinct revision_year from subject",$conn);
	while($res=mysql_fetch_array($sql))
	{
		echo "<option value=\"$res[0]\">".$res[0]."</option>";
	}
mysql_close();
?></select></p>
</div>
<p id="p-container">
<span><input type="submit" value="Insert"></span>
</p>
</form>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>
