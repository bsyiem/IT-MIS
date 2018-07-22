<?php
include_once("db.php");
session_start();

$regno=$_POST['registration_number'];
$regye=$_POST['registration_year'];
$course=$_POST['course'];
$batch=$_POST['batch'];
$sid=$_POST['student_id'];
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$rno=$_POST['rollno'];
$gen=$_POST['gender'];
$dob=$_POST['dob'];
$per_add=$_POST['permanent_address'];
$mail_add=$_POST['mailing_address'];
$con=$_POST['contact'];
$email=$_POST['email'];
$father=$_POST['father_name'];
$mother=$_POST['mother_name'];
$guardian=$_POST['guardian_name'];
$gemail=$_POST['guardian_email'];
$gcon=$_POST['guardian_contact'];
$bg=$_POST['bloodgroup'];
$nation=$_POST['nationality'];
$reli=$_POST['religion'];
$caste=$_POST['caste'];
$ms=$_POST['marital_status'];
?>
<html>
<head>
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
<div id="body">
<?php
$chk=mysql_result(mysql_query("select count(*) from student where rollno=\"$rno\"",$conn),0);
$chk1=mysql_result(mysql_query("select count(*) from user where username=\"$email\"",$conn),0);
if($chk==0 && $chk1==0)
{
	mysql_query("insert into student(rollno,sid,batch,course,fname,lname,gender,dob,per_add,mail_add,contact,email,father_name,mother_name,guardian_name,guardian_contact,guardian_email,bloodgroup,nationality,religion,caste,marital_status,regno,regyear) values('$rno','$sid','$batch','$course','$fname','$lname','$gen',STR_TO_DATE('$dob','%d/%m/%Y'),'$per_add','$mail_add','$con','$email','$father','$mother','$guardian','$gcon','$gemail','$bg','$nation','$reli','$caste','$ms','$regno','$regye')",$conn) or die("error: ".mysql_error());	
	mysql_query("insert into user(username,password,student_view) values('$email',md5('password'),'yes')",$conn) or die("error: ".mysql_error()); 
	echo "<br><br>";
	echo "<h2><center>Records successfully added</center></h2>";
	echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else
{
	if($chk>0)
	{
		echo "<br><br>";
		echo "<h2><center>Student with same roll number already exists!</center></h2><br>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
	if($chk1>0)
	{
		echo "<br><br>";
		echo "<h2><center>User with same email already exists!</center></h2>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
}
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