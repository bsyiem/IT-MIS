<?php
session_start();
include "db.php";
include "checker.php";
if($cv==0 && $av==0 && $tv==0 && $sv==0)
{
	header("location:index.php");
	exit;
}
?>
<html>
<head>

<title>Change Password</title>
<script>
function val()
{
	var x = document.getElementById("new1").value;
	var y = document.getElementById("new2").value;
	var z = document.getElementById("old").value;
	if(x=="" || y=="" || z=="" || x== null || y==null || z==null )
	{
		alert("All Fields are Mandatory!");
		return false;
	}
	if(x!=y)
	{
		alert("Passwords do not match");
		return false;
	}
	return true;
}
</script>
</head>

<body>
<form name="form1" action="passchange1.php" method="post" onsubmit="return val()">
<p>Enter Old Password<input type="password" name="old" id="old"></p>
<p>Enter New Password<input type="password" name="new1" id="new1"></p>
<p>Confirm New Password<input type="password" name="new2" id="new2"></p>
<p><input type="submit" value="Change"></p>
</form>
</body>
</html>
<?php
mysql_close($conn);
?>