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
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
<script src="chk_empty.js"></script>
<script src="and.js"></script>
</head>
<body>
<?php
include("header.php");
?>

<br>

<form name="form1" method="post" action="admitsingle1.php" onsubmit="return an(chk_empty(&quot;rollno&quot;),chk_empty(&quot;exam&quot;));">
<h1>Repeater Management</h1>
<div class="inset">
<p>
<label for="rollno">Enter Roll Number</label> <input type="text" name="rollno" id="rollno"></p>
<p>
<label for="rollno">Enter Examination Date</label> <input type="text" name="exam" id="exam"></p>
</div>
<p class="p-container">
<span><input type="submit" value="Generate"></span>
</p>
</form>
<?php
include("footer.php");
?>
</body>
</html>