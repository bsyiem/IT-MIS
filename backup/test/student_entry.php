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
</head>
<body>
<p><h1>Student Entry</h1></p>
<div><p style="float:left;"><a href = "index.php">Menu</a></p><p style="float:right;"><a href = "logout.php">logout</a></p></div><br><br>
<hr>
<form action="student_entry1.php" method="post" name="form1" onSubmit="return an(chk_date(&quot;form1&quot;,&quot;dob&quot;),an(chk_num(&quot;form1&quot;,&quot;regyear&quot;),an(chk_num(&quot;form1&quot;,&quot;regno&quot;),an(chk_num(&quot;form1&quot;,&quot;batch&quot;),an(chk_num(&quot;form1&quot;,&quot;student_id&quot;),an(chk_form(&quot;student_id&quot;),an(chk_form(&quot;first_name&quot;),an(chk_form(&quot;last_name&quot;),an(chk_empty(&quot;rollno&quot;),an(chk_form(&quot;dob&quot;),an(chk_form(&quot;permanent_address&quot;),an(chk_form(&quot;mailing_address&quot;),an(chk_form(&quot;contact&quot;),an(chk_email(&quot;form1&quot;,&quot;email&quot;),an(chk_form(&quot;father_name&quot;),an(chk_form(&quot;mother_name&quot;),an(chk_form(&quot;guardian_name&quot;),an(chk_form(&quot;nationality&quot;),chk_form(&quot;religion&quot;)))))))))))))))))))">
	<p>
		Student ID: <input type="text" id="student_id" name="student_id">
	</p>
	<p>
		First Name: <input type="text" id="first_name" name="first_name">
	</p>
	<p>
		Last Name: <input type="text" id="last_name" name="last_name">
	</p>
	<p>
		Roll Number: <input type="text" id="rollno" name="rollno">
	</p>
	<p>
		Batch: <input type="text" id="rollno" name="batch">
	</p>
	<p>
		Course: <select name="course">
		<option value="B.Tech">B.Tech</option>
		<option value="M.Tect">M.Tech</option>
		<option value="M.Tect">Phd</option>
		</select>
	</p>
	<p>
		Gender: <input type="radio" id="gender" name="gender" value="m" checked> Male
			    <input type="radio" id="gender" name="gender" value="f"> Female
	</p>
	<p>
		D.O.B (dd/mm/yyyy): <input type="text" id="dob" name="dob">
	</p>
	<p>
		Permanent Address: <textarea name="permanent_address" id="permanent_address"></textarea>
	</p>
	<p>
		Mailing Address: <textarea name="mailing_address" id="mailing_address"></textarea>
	</p>
	<p>
		Contact: <input type="text" name="contact" id="contact">
	</p>
	<p>
		Email: <input type="text" name="email" id="email">
	</p>
	<p>
		Father's Name: <input type="text" name="father_name" id="father_name">
	</p>
	<p>
		Mother's Name: <input type="text" name="mother_name" id="mother_name">
	</p>
	<p>
		Guardian's Name: <input type="text" name="guardian_name" id="guardian_name">
	</p>
	<p>
		Guardian's contact: <input type="text" name="guardian_contact" id="guardian_contact">
	</p>
	<p>
		Guardian's Email: <input type="text" name="guardian_email" id="guardian_name">
	</p>
	<p>
		Blood Group: <select name="bloodgroup" id="bloodgroup" size="1">
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
		Nationality: <input type="text" name="nationality" id="nationality">
	</p>
	<p>
		Religion: <input type="text" name="religion" id="religion">
	</p>
	<p>
		Caste: <select name="caste" id="caste" size="1">
					 	<option value="OBC">OBC</option>
					 	<option value="SC">SC</option>
					 	<option value="ST">ST</option>
					 	<option value="GEN">GEN</option>
					  </select>
	</p>
	<p>
		Marital Status: <input type="radio" name="marital_status" id="marital_status" value="yes">Yes
						<input type="radio" name="marital_status" id="marital_status" value="no" checked>No

	</p>
	<p>
		Registration Number: <input type="text" name="regno" id="regno">
	</p>
	<p>
		Registration Year: <input type="text" name="regyear" id="regyear">
	</p>
	<p>
		<input type="submit" value="Enter">
	</p>
</form>
<?php
mysql_close($conn);
?>
</body>
</html>
