<tr>
<td><input name="<?php echo($ares);?>" type="checkbox" id="username" value="yes"></td>
<td><?php echo $res; ?></td>
<td><input name="<?php echo("1_$ares");?>" type="checkbox" id="username" value="yes" <?php $sql1=mysql_query("select `student_view` from user where username ='$res'",$conn); $res1=mysql_result($sql1,0); if($res1=='yes'){ echo "checked";};?>></td>
<td><input name="<?php echo("2_$ares");?>" type="checkbox" id="username" value="yes" <?php $sql1=mysql_query("select `teacher_view` from user where username ='$res'",$conn); $res1=mysql_result($sql1,0); if($res1=='yes'){ echo "checked";};?>></td>
<td><input name="<?php echo("3_$ares");?>" type="checkbox" id="username" value="yes" <?php $sql1=mysql_query("select `clerk_view` from user where username ='$res'",$conn); $res1=mysql_result($sql1,0); if($res1=='yes'){ echo "checked";};?>></td>
<td><input name="<?php echo("4_$ares");?>" type="checkbox" id="username" value="yes" <?php $sql1=mysql_query("select `admin_view` from user where username ='$res'",$conn); $res1=mysql_result($sql1,0); if($res1=='yes'){ echo "checked";};?>></td>
</tr>
