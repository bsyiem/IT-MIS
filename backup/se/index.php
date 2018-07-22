<?php
session_start();
if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);
	session_destroy();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>testing</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
::selection {
	background: transparent;  
}

body{
	font-family: TriplexLight, Verdana;
    background-size: cover 100%;
	background: url(bg.jpg);
	-webkit-user-select: none;

}
.contain{
	position:absolute;
	display:block;
	width:100%;
	height:100%;
	display:block;
	-webkit-transition:.5s all ease;
	-o-transition:.5s all ease;
	-moz-transition:5s all ease;
	transition:.5s all ease;
	z-index:0;
}
#welcome {
            text-align: center;
            font-size: 50px;
            line-height: 42px;
            color: #fff;
            transform: scale(1);
			margin-top:200px;
			color: #fff;
            text-transform: uppercase;
        }
.box{
	position:relative;
	left:0;
	right:0;
	margin:100px auto;
	padding:10px 10px 10px 10px;
	background-color:#FFFFFF;
	box-shadow:0 0 20px #000;
	width:300px;
	display:none;
	height:190px;
}
.box p{
  			text-align: center;
            margin: 5px 0px;
            padding: 20px 0;
            background: #333;
            color: #fff;
}
input[type="checkbox"]{
	display:none;
}
input[type="reset"]{
	display:none;
}
label[for='chkme']{
	position:absolute;
	cursor:pointer;
	color:#fff;
	background:#333;
	padding:10px;
	z-index:1;
}
label[for='close']{
	position:static;
	width:10px;
	height:10px;
	line-height:8px;
	display:block;
	float:left;
	cursor:pointer;
	color:#fff;
	background:#333;
	padding:10px;
	border:2px solid #fff;
	border-radius:30px;
	text-align:center;
	box-shadow:0 0 5px #000;
	z-index:1;
	margin:-25px;
}
#go{
	text-align:right;
	float:right;
	cursor:pointer;
	color:#fff;
	background:#333;
	padding:10px;
	z-index:1;
}
#go:hover{
	background-color:#FFFFFF;
	color:#000000;
}
.login {
		width:inherit;
        border:2px solid;
		border-radius:30px;
        outline: none;
        background: #bbb;
        color: #fff;
        padding: 10px 0px;
        margin: 1px 0;
		text-align:center;
}
.login:hover{
	background-color:#66CCFF;
}
.login:focus{
	background-color:#66CCFF;
}
input[type='checkbox']:checked ~ #content{
	background-color:#666666;
}
input[type='checkbox']:checked ~ #content .box{
	display:block;
}
input[type='checkbox']:checked ~ #welcome{
	display:none;
}
input[type='submit']{
	display:none;
}

</style>
<script src="chk_form.js">
</script>
<script src="and.js">
</script>
</head>

<body>
<div id="wrapper">
<form action="login1.php" method="post" onsubmit="return an(chk_form(&quot;username&quot;),chk_form(&quot;password&quot;))">
<input id="chkme" type="checkbox"><label for="chkme">Sign In</label>
<div class="contain" id="welcome">
welcome
</div>
<div class="contain" id="content">
<div class="box">
<input type="reset" id="close"><label for="close">x</label>
<p>Login</p>

<input type="text" placeholder="Username" class="login" name="username" id="username">
<input type="password" placeholder="Password" class="login" name="password" id="password">
<label for="submit" id="go">Sign In</label><input type="submit" id="submit">
</div>
</div>

</form>
</div>
</body>
</html>
