<?php
include_once("checker.php");
?>
<div id="main_header">
<div id="header">
  <ul>
    <li><a href="index.php" class="home" title="home">Home</a></li>
	<?php
	if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
	{

		echo "<li><a href=\"logout.php\" class=\"logout\" title=\"Log Out\">LogOut</a></li>";
	}	
	else
	{
		echo "<li><a href=\"login.php\" class=\"login\" title=\"Login\">Login</a></li>";
	}
	?>
    
    <li><a href="#" class="contact" title="contact">Contact</a></li>
  </ul>
  <ul class="navi">
    <li><a href="#">Services</a></li>
    <li><a href="#">Notifications</a></li>
    <li><a href="operation.php">Operation</a></li>
    <li><a href="#">About Us</a></li>
	<?php
	if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
	{
		echo "<li class=\"li1\"><a href=\"passchange.php\">Change Password</a></li></ul>";
	}	
	else
	{
		echo "<li class=\"li1\"><a href=\"sign_up.php\">Sign In</a></li></ul>";
	}
	?>
 
</div>
</div>