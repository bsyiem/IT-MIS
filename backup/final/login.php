<?php
session_start();
if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
	session_destroy();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Login</title>

<link href="style.css" rel="stylesheet" type="text/css" />
<link href="css/lstyle.css" rel="stylesheet" type="text/css" />
<script src="chk_form.js">
</script>
<script src="and.js">
</script>
</head>

<body>
<?php
include("header.php"); 
?>
<form action="login1.php" method="post" onsubmit="return an(chk_form(&quot;username&quot;),chk_form(&quot;password&quot;))">
  <h1>Log in</h1>
  <div class="inset">
  <p>
    <label for="email">USERNAME</label>
    <input type="text" name="username" id="username">
  </p>
  <p>
    <label for="password">PASSWORD</label>
    <input type="password" name="password" id="password">
  </p>
  </div>
  <p class="p-container">
  <span><input type="submit" name="go" id="go" value="Log in"></span>
  </p>
</form>

<?php
include("footer.php");
?>
</body>
</html>
