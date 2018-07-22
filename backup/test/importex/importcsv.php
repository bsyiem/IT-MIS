<?php
include "db.php";
include "checker.php";

$file = fopen("archives/Student_information.csv","r");


$i=0;
while($cols=fgetcsv($file,0,"\n"))
{
	$ele=explode(",",$cols[0]);
	$noele=count($ele);
	for($j=0;$j<$noele;$j++)
	{
		$data[$i][$j]=$ele[$j];
	}
	$i+=1;
}

$no=1;

while($no<$i)
{
	mysql_query("insert into student2 values('".$data[$no][0]."','".$data[$no][1]."','".$data[$no][2]."','".$data[$no][3]."','".$data[$no][4]."','".$data[$no][5]."','".$data[$no][6]."','".$data[$no][7]."','".$data[$no][8]."','".$data[$no][9]."','".$data[$no][10]."','".$data[$no][11]."','".$data[$no][12]."','".$data[$no][13]."','".$data[$no][14]."','".$data[$no][15]."','".$data[$no][16]."','".$data[$no][17]."','".$data[$no][18]."','".$data[$no][19]."','".$data[$no][20]."','".$data[$no][21]."','".$data[$no][22]."','".$data[$no][23]."')",$conn) or die ("error:".mysql_error());
	$no+=1;
}

?>