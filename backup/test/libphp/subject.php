<?php
$sqlsubjectattr=mysql_query("show columns from subject",$conn);
$nosubjectattr=mysql_num_rows($sqlsubjectattr);
$subjectattr=mysql_fetch_array($sqlsubjectattr);
$sqlsubject=mysql_query("select * from subject",$conn);
$nosubject=mysql_num_rows($sqlsubject);
$subject=mysql_fetch_array($sqlsubject);
$sqldissubjectsem=mysql_query("select distinct(sem) from subject",$conn);
$nodissubjectsem=mysql_num_rows($sqldissubjectsem);
$dissubjectsem=mysql_fetch_array($sqldissubjectsem);
$sqldissubjectcourse_year=mysql_query("select distinct(course_year) from subject",$conn);
$nodissubjectcourse_year=mysql_num_rows($sqldissubjectcourse_year);
$dissubjectcourse_year=mysql_fetch_array($sqldissubjectcourse_year);
?>