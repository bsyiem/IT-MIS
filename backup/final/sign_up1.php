<?php
session_start(); 
include_once("db.php");
?>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
</head> 
<?php
include("header.php");
$user=$_POST['username'];
$passwd=$_POST['password'];
$epass=md5($passwd);
$sq="select count(*) from user where username='$user'";
$coun=mysql_query($sq,$conn);
$count=mysql_result($coun,0);
if($count>0)
{
	echo "<br><br>";
	echo("<h2><center>Username already exists</center></h2>");
	echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
}
else
{
	$sql="insert into user(username,password) values('$user','$epass')";
	$result=mysql_query($sql,$conn);
	mysql_close($conn);
	echo "<br><br>";
	echo("<h2><center>Records are added successfully..<a href =\"sign_up.php\">Back</a></center></h2>");
	echo "<br><br><br><br><br><br><br><br><br><br><br><br>";
}
include("footer.php");
?> 
</body>
</html>