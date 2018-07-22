<?php
session_start();
include_once("db.php");
include_once("checker.php");
if($cv==0 && $av==0)
{
	header("location:login.php");
	exit;
}
?>
<html>
<head>
<title>Student Entry</title>
<script src="chk_num.js"></script>
<script src="and.js"></script>
<script src="chk_email.js"></script>
<script src="chk_form.js"></script>
<script src="chk_date.js"></script>
<script src="chk_empty.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
include("header.php");
?>

<form action="student_entry1.php" method="post" name="form1" onSubmit="return an(chk_date(&quot;form1&quot;,&quot;dob&quot;),an(chk_num(&quot;form1&quot;,&quot;regyear&quot;),an(chk_num(&quot;form1&quot;,&quot;regno&quot;),an(chk_num(&quot;form1&quot;,&quot;batch&quot;),an(chk_num(&quot;form1&quot;,&quot;student_id&quot;),an(chk_form(&quot;student_id&quot;),an(chk_form(&quot;first_name&quot;),an(chk_form(&quot;last_name&quot;),an(chk_empty(&quot;rollno&quot;),an(chk_form(&quot;dob&quot;),an(chk_form(&quot;permanent_address&quot;),an(chk_form(&quot;mailing_address&quot;),an(chk_form(&quot;contact&quot;),an(chk_email(&quot;form1&quot;,&quot;email&quot;),an(chk_form(&quot;father_name&quot;),an(chk_form(&quot;mother_name&quot;),an(chk_form(&quot;guardian_name&quot;),an(chk_form(&quot;nationality&quot;),chk_form(&quot;religion&quot;)))))))))))))))))))">
	<h1>Student Entry</h1>
	<div class="inset">
	<p>
		<label for="student_id">Student ID </label><input type="text" id="student_id" name="student_id">
	</p>
	<p>
		<label for="first_name">First Name</label><input type="text" id="first_name" name="first_name">
	</p>
	<p>
		<label for="last_name">Last Name</label> <input type="text" id="last_name" name="last_name">
	</p>
	<p>
		<label for="rollno">Roll Number</label><input type="text" id="rollno" name="rollno">
	</p>
	<p>
		<label for="batch">Batch</label><input type="text" id="batch" name="batch">
	</p>
	<p>
		<label for="course">Course </label><select name="course">
		<option value="B.Tech">B.Tech</option>
		<option value="M.Tect">M.Tech</option>
		<option value="M.Tect">Phd</option>
		</select>
	</p>
	<p>
		<label for="gender">Gender</label><input type="radio" id="gender" name="gender" value="m" checked> Male
			    <input type="radio" id="gender" name="gender" value="f"> Female
	</p>
	<p>
		<label for="dob">D.O.B (dd/mm/yyyy)</label><input type="text" id="dob" name="dob">
	</p>
	<p>
		Permanent Address: <textarea name="permanent_address" id="permanent_address"></textarea>
	</p>
	<p>
		<label for="mailing_address">Mailing Address</label> <textarea name="mailing_address" id="mailing_address"></textarea>
	</p>
	<p>
		<label for="contact">Contact</label> <input type="text" name="contact" id="contact">
	</p>
	<p>
		<label for="email">Email</label><input type="text" name="email" id="email">
	</p>
	<p>
		<label for="father_name">Father's Name</label> <input type="text" name="father_name" id="father_name">
	</p>
	<p>
		<label for="mother_name">Mother's Name</label> <input type="text" name="mother_name" id="mother_name">
	</p>
	<p>
		<label for="guardian_name">Guardian's Name</label> <input type="text" name="guardian_name" id="guardian_name">
	</p>
	<p>
		<label for="guardian_contact">Guardian's contact</label><input type="text" name="guardian_contact" id="guardian_contact">
	</p>
	<p>
		<label for="guardian_email">Guardian's Email</label> <input type="text" name="guardian_email" id="guardian_name">
	</p>
	<p>
		<label for="bloodgroup">Blood Group</label> <select name="bloodgroup" id="bloodgroup" size="1">
					 	<option value="A+">A+</option>
					 	<option value="AB+">AB+</option>
					 	<option value="B+">B+</option>
					 	<option value="O+">O+</option>
					 	<option value="A-">A-</option>
					 	<option value="AB-">AB-</option>
					 	<option value="B-">B-</option>
					 	<option value="O-">O-</option>
					  </select>
	</p>
	<p>
		<label for="nationality">Nationality</label><input type="text" name="nationality" id="nationality">
	</p>
	<p>
		<label for="religion">Religion</label><input type="text" name="religion" id="religion">
	</p>
	<p>
		<label for="caste">Caste</label> <select name="caste" id="caste" size="1">
					 	<option value="OBC">OBC</option>
					 	<option value="SC">SC</option>
					 	<option value="ST">ST</option>
					 	<option value="GEN">GEN</option>
					  </select>
	</p>
	<p>
		<label for="marital_status">Marital Status</label><input type="radio" name="marital_status" id="marital_status" value="yes">Yes
						<input type="radio" name="marital_status" id="marital_status" value="no" checked>No

	</p>
	<p>
		<label for="regno">Registration Number</label><input type="text" name="regno" id="regno">
	</p>
	<p>
		<label for="regyear">Registration Year</label> <input type="text" name="regyear" id="regyear">
	</p>
	</div>
	<p class="p-container">
		<span><input type="submit" value="Enter"></span>
	</p>
</form>
<?php
mysql_close($conn);
include("footer.php");
?>
</body>
</html>
