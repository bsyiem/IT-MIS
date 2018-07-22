<?php
session_start();
if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
	session_destroy();
}
?>
<html>
<head>
<title>Login</title>
<script src="chk_form.js">
/*function chk_form(idname)
{
	var x=document.getElementById(idname).value;
	if(x==""||x==null)
	{
		alert(idname +" must be filled");
		return false;
	}
	else
	{
		return true;
	}
}
function an(a,b)
{
	return a&&b;
}*/
</script>
<script src="and.js">
</script>
</head>
<body>
<h1>Login</h1><br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p></div>
<br>
<br>
<hr>
<form action="login1.php" method="post" onsubmit="return an(chk_form(&quot;username&quot;),chk_form(&quot;password&quot;))">
<font size=+3>Enter Email Address:</font>&nbsp;&nbsp;<input type = "text" name = "username" id="username"><br>
<font size=+3>Enter password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><input type = "password" name = "password" id="password">
<br>
<br>
<input type = "submit" name = "go" value="GO" id="chk">
</form>
</body>
</html>
