<html>
<?php
session_start();
include_once "db.php";
include_once "checker.php";
?>
<head>
<title>Sign In</title>
<script>
function chk_email_pass()
{
	var sp="!#$%^&*(){}[]-+=;:'|/><?\\,\"";
	var len=sp.length;
	var x=document.forms["test_form"]["username"].value;
	if(x==""||x==null)
	{
		alert("username must be filled");
		return false;
	}
	var apos=x.indexOf("@");
	var lapos=x.lastIndexOf("@");
	var dpos=x.lastIndexOf(".");
	if(apos<1 || dpos<apos+2 || dpos+2>x.length || apos!=lapos)
	{
		alert("invalid username!");
		return false;
	}
	for(var i=0;i<len;i++)
	{
		for(var j=0;j<x.length;j++)
		{
			if(x.charAt(j)==sp.charAt(i) || x.charAt(j)==' ')
			{
				alert("Use of invalid symbol");
				return false;
			}
		}
	}
	if(!isNaN(x.charAt(0)))
	{
		alert("Email cannot start with a number");
		return false;
	}
	var y =document.forms["test_form"]["password"].value;
	if(y==""||y==null)
	{
		alert("password must be filled");
		return false;
	}
	var z =document.forms["test_form"]["ver_password"].value;
	if(z==""||z==null)
	{
		alert("password verification must be filled");
		return false;
	}
	if(y!=z)
	{
		alert("password verification does not match password!");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<h1>Sign In</h1><br>
<div><p style="float:left;"><a href = "index.php">Menu</a></p>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
?>
</div><br><br>
<hr>
<form action="sign_up1.php" method="post" name="test_form" onsubmit="return chk_email_pass()">
  <p><font size="+1" face="Arial, Helvetica, sans-serif">Enter Email Address:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <input name="username" type="text" id="username">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font></p>
  <p><font size="+1" face="Arial, Helvetica, sans-serif">Enter password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="password" type="password" id="password">    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </font></p>
   <p><font size="+1" face="Arial, Helvetica, sans-serif">Verify password: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input name="ver_password" type="password" id="ver_password">    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </font></p>
  <p><font size="+1" face="Arial, Helvetica, sans-serif"> </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </p>
  </p>    
<p> 
    <font size="+1" face="Arial, Helvetica, sans-serif">
    <input type="submit" name="Submit" value="Create">
  </font></p>
</form>
</body>
</html>
