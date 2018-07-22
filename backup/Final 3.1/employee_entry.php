<html>
<head>
<title>Employee Entry</title>
<script src="chk_num.js"></script>
<script src="chk_form.js"></script>
<script src="and.js"></script>
<script src="chk_email.js"></script>
<script src="chk_empty.js"></script>
<?php
session_start();
include_once "db.php";
include_once("checker.php");
if($cv==0 && $av==0)
{
	header("location:index.php");
	exit;
}
?>
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
<form name="form1" method="POST" action="employee_entry1.php" onsubmit="return an(chk_num(&quot;form1&quot;,&quot;Eid&quot;),an(chk_form(&quot;First_Name&quot;),an(chk_form(&quot;Last_Name&quot;),an(chk_form(&quot;Eid&quot;),an(chk_form(&quot;Phone_No&quot;),an(chk_form(&quot;Email_Add&quot;),an(chk_form(&quot;Role&quot;),chk_email(&quot;form1&quot;,&quot;Email_Add&quot;))))))))">
<h1>EMPLOYEE ENTRY</h1>
<div class="inset">
<p><label for="First_Name">First Name </label><input type="text" name="First_Name" id="First_Name"></p>
<p><label for="Last_Name">Last Name </label><input type="text" name="Last_Name" id="Last_Name"></p>
<p><label for="Eid">Employee ID</label><input type="text" name="Eid" id="Eid"></p>
<p><label for="Phone_No">Phone Number</label><input type="text" name="Phone_No" id="Phone_No"></p>
<p><label for="Email_Add">Email Address</label><input type="text" name="Email_Add" id="Email_Add"></p>
<p><label for="Category">Category</label><select name="Category">
			<option value="non_teaching">NON-TEACHING</option>
			<option value="teaching">TEACHING</option>
			</select>
</p>
<p><label for="Role">Role</label><input type="text" name="Role" id="Role"></p>
</div>
<p class="p-container"><span><input type="Submit" value="Enter"></span></p>
</form>
<?php
mysql_close($conn);
?>
</div>
</div>
<?php
include("footer.php");
?>
</div>
</body>
</html>
