<html>
<?php
session_start();
include_once "db.php";
include_once "checker.php";
?>
<head>
<title>Sign In</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />

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
<?php
include("header.php");
?>
<form action="sign_up1.php" method="post" name="test_form" onsubmit="return chk_email_pass()">
	<h1>Sign In</h1>
	<div class="inset">
  <p><label for="username">EMAIL ADDRESS</label>
      <input name="username" type="text" id="username">
 
  <p><label for="password">PASSWORD</label>
    <input name="password" type="password" id="password">    
  </p>
   <p><label for="ver_password">VERIFY PASSWORD</label>
    <input name="ver_password" type="password" id="ver_password">    
   </p>    
	</div>
	<p class="p-container">
    <span><input type="submit" name="Submit" value="Create" id="submit"></span>
 </p>
</form>
<?php
include("footer.php");
?>
</body>
</html>
