<?php
include_once("checker.php");
?>
<div id="main_header">
<div id="header">
  <ul>
    <li><a href="home.php" class="home" title="home">Home</a></li>
	<?php
	if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
	{

		echo "<li><a href=\"logout.php\" class=\"logout\" title=\"Log Out\">LogOut</a></li>";
	}	
	else
	{
		echo "<li><a href=\"index.php\" class=\"login\" title=\"Login\">Login</a></li>";
	}
	?>
  </ul>
  <ul class="navi">  
  	<li></li>
	<?php
	if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
	{
		echo "<li class=\"li1\"><a href=\"passchange.php\">Change Password</a></li></ul>";
	}	
	?>
 	<li></li>
</div>
</div>