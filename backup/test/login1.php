<html>
<?php 
session_start();
include_once("db.php");
$user=$_POST['username'];
$pass=md5($_POST['password']);
$login=mysql_query("select count(*) from user where (username = '$user') and (password = '$pass')",$conn);
$result=mysql_result($login,0);
if($result==1)
{
	$_SESSION['username']=$user;
	header("location:index.php");
	exit;
}
else
{
	echo "INVALID username or password<br><a href=\"login.php\">Go back to Login</a>";
}
mysql_close($conn);
?>
</html>