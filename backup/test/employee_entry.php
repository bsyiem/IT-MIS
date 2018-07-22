<html>
<head>
<title>Employee Entry</title>
<script src="chk_num.js"></script>
<script src="chk_form.js"></script>
<script src="and.js"></script>
<script src="chk_email.js"></script>
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
</head>

<body>
<h1>EMPLOYEE ENTRY</h1>
<div><p style="float:left;"><a href = "index.php">Menu</a></p><p style="float:right;"><a href = "logout.php">logout</a></p></div><br><br>
<hr>
<form name="form1" method="POST" action="employee_entry1.php" onsubmit="return an(chk_num(&quot;form1&quot;,&quot;Eid&quot;),an(chk_form(&quot;First_Name&quot;),an(chk_form(&quot;Last_Name&quot;),an(chk_form(&quot;Eid&quot;),an(chk_form(&quot;Phone_No&quot;),an(chk_form(&quot;Email_Add&quot;),an(chk_form(&quot;Role&quot;),an(chk_form(&quot;Designation&quot;),chk_email(&quot;form1&quot;,&quot;Email_Add&quot;)))))))))">
<p>First Name<input type="textbox" name="First_Name" id="First_Name"></p>
<p>Last Name <input type="textbox" name="Last_Name" id="Last_Name"></p>
<p>ID Number <input type="textbox" name="Eid" id="Eid"></p>
<p>Phone Number <input type="textbox" name="Phone_No" id="Phone_No"></p>
<p>Email Address <input type="textbox" name="Email_Add" id="Email_Add"></p>
<p>Category <select name="Category">
			<option value="non_teaching">NON-TEACHING</option>
			<option value="teaching">TEACHING</option>
			</select>
</p>
<p>Role <input type="textbox" name="Role" id="Role"></p>
<p><input type="Submit" value="Enter"></p>
</form>
<?php
mysql_close($conn);
?>
</body>
</html>
