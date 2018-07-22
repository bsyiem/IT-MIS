<?php
include_once("db.php");
session_start();
include_once("checker.php");
?>
<html>
<head>
<title>Menu</title>
<style>
/*Initialize*/	
ul#menu, ul#menu li ul.sub-menu {
    padding:0;
    margin: 0;
}
ul#menu li, ul#menu li ul.sub-menu li {
    list-style-type: none;
    display: inline-block;
}
/*Link Appearance*/
ul#menu li a, ul#menu li ul.sub-menu li a {
    text-decoration: none;
    color: #fff;
    background: #666;
    padding: 20px;
	width:200px;
    display:inline-block;
}
/*Make the parent of sub-menu relative*/
ul#menu li {
    position: relative;
}
/*sub menu*/
ul#menu li ul.sub-menu {
    display:none;
    position: absolute;
    top: 50px;
    left: 0;
    width: 100px;
}
ul#menu li:hover ul.sub-menu {
    display:block;
}
</style>
</head>
<body>
<h1 align="center">MENU</h1><br>
<div>
<?php
if($av!=0 || $cv!=0 || $sv!=0 || $tv!=0)
{
	echo "<p style=\"float:left\"><a href = \"passchange.php\">Change Password</a></p>";
	echo "<p style=\"float:right\"><a href = \"logout.php\">logout</a></p>";
}
else
{
	echo "<p style=\"float:left\"><a href = \"sign_up.php\">Sign Up</a></p><p style=\"float:right\"><a href = \"login.php\">login</a></p>";
}
?>
</div>
<br><br>
<hr>
<br><br><br>
<ul id="menu" align="center">
	<li>
     <a href = "#">Common View</a>
	 <ul class="sub-menu">
	 <?php
		if($av==0 && $cv==0 && $tv==0)
		{	 
	 		echo "<li>
						<a href=\"student_info.php\">Student Information</a>
				  </li>";
		}
		else
		{
			echo "<li>
						<a href=\"student_info_priv.php\">Student Information</a>
				  </li>";
		}
		?>
	 </ul>
    </li>
	<?php
	if($sv==1 || $av==1)
	{
		echo "
    <li>
     <a href = \"#\">Student View</a>
    </li>";
	}
	?>
	<?php
	if($tv==1 || $av==1)
	{
		echo "
    	<li><a href=\"#\">Teacher View</a>
			<ul class=\"sub-menu\">
				<li> 
					<a href=\"attendance_gen.php\">Attendance Sheet Generation</a>
				</li>
				<li> 
					<a href=\"atninsertses.php\">Attendance Insertion For Sessional</a>
				</li>
				<li> 
					<a href=\"atninsertmid.php\">Attendance Insertion For Midterm</a>
				</li>
				<li> 
					<a href=\"marksinsertses.php\">Marks Insertion For Sessional</a>
				</li>
				<li> 
					<a href=\"marksinsertmid.php\">Marks Insertion For Midterm</a>
				</li>
			</ul>
    	</li>";
	}
	?>
	<?php
	if($cv==1 || $av==1)
	{
		echo "
    	<li><a href=\"#\">Clerk View</a>
			<ul class=\"sub-menu\">
				<li>
					<a href=\"student_entry.php\">Student Entry</a>
				</li>
				<li>
					<a href=\"employee_entry.php\">Employee Entry</a>
				</li>
				<li>
					<a href=\"fee.php\">Exam Fees Maintenance</a>
				</li>
				<li>
					<a href=\"debarred.php\">Debarred Students</a>
				</li>
				<li>
					<a href=\"repeater.php\">Repeater Management</a>
				</li>
			</ul>
    	</li>";
	}
	?>
	<?php
	if($av==1)
	{
		echo "
    	<li><a href=\"#\">Administration View</a>

        <ul class=\"sub-menu\">
            <li>
                <a href=\"a.php\">Access Control</a>
            </li>
        </ul>
    	</li>";
	}
	mysql_close($conn);
	?>
</ul>
</body>
</html>