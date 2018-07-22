<?php
session_start();
include "db.php";

include_once "checker.php";

if($av==0 && $cv==0 && $tv==0)
{
	header("location:index.php");
	exit;
}
$content=NULL;
$batch=$_POST['batch'];
$course=$_POST['course'];

header("Content-Type:application/csv");
header("Content-Disposition:attachment;Filename=Student_information.csv");

$sql=mysql_query("show columns from student",$conn);
while($res=mysql_fetch_array($sql))
{
	$content.=$res[0].","; //or $content.=$res['Field'].","; 
}
$content=substr($content,0,-1)."\n";

$sql1=mysql_query("select * from student where batch='$batch' and course='$course'",$conn);
while($res1=mysql_fetch_assoc($sql1))
{
	$res1['per_add']=strtr($res1['per_add'],",","_");
	$res1['mail_add']=strtr($res1['mail_add'],",","_");
	$content.=join(',',$res1)."\n";
}

echo "$content";
mysql_close($conn);
?>