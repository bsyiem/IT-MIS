<?php
include_once("db.php");
session_start();
include_once("checker.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>

<link href="style.css" rel="stylesheet" type="text/css" />
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
<?php
include("header.php"); 
?>
<body>
<div id="main_body">
<br>
<br>
<br>
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
				<li> 
					<a href=\"electivemgt.php\">Elective Subject Management</a>
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
				<li>
					<a href=\"admit.php\">Admit Card Generation</a>
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
			<li>
                <a href=\"teachermgt.php\">Teacher Management</a>
            </li>
        </ul>
    	</li>";
	}
	mysql_close($conn);
	?>
</ul>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
</div>

<?php
include("footer.php");
?>
</body>
</html>
