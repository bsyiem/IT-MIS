<?php
include_once("checker.php");
?>
<ul align="center">
	<li>
     <a href = "#">Common View</a>
	 <ul>
	 <?php
		if($av==0 && $cv==0 && $tv==0)
		{	 
	 		echo "<li>
						<a href=\"student_info.php\">Student Information</a>
				  </li>";
		}
		else
		{
			echo "<li>
						<a href=\"student_info_priv.php\">Student Information</a>
				  </li>";
		}
		?>
	 </ul>
    </li>
	<?php
	if($sv==1 || $av==1)
	{
		echo "
    <li>
     <a href = \"#\">Student View</a>
    </li>";
	}
	?>
	<?php
	if($tv==1 || $av==1)
	{
		echo "
    	<li><a href=\"#\">Teacher View</a>
			<ul>
				<li> 
					<a href=\"attendance_gen.php\">Attendance Sheet Generation</a>
				</li>
				<li> 
					<a href=\"atninsertses.php\">Attendance Insertion For Sessional</a>
				</li>
				<li> 
					<a href=\"atninsertmid.php\">Attendance Insertion For Midterm</a>
				</li>
				<li> 
					<a href=\"marksinsertses.php\">Marks Insertion For Sessional</a>
				</li>
				<li> 
					<a href=\"marksinsertmid.php\">Marks Insertion For Midterm</a>
				</li>
				<li> 
					<a href=\"electivemgt.php\">Elective Subject Management</a>
				</li>
			</ul>
    	</li>";
	}
	?>
	<?php
	if($cv==1 || $av==1)
	{
		echo "
    	<li><a href=\"#\">Clerk View</a>
			<ul>
				<li>
					<a href=\"student_entry.php\">Student Entry</a>
				</li>
				<li>
					<a href=\"employee_entry.php\">Employee Entry</a>
				</li>
				<li>
					<a href=\"fee.php\">Exam Fees Maintenance</a>
				</li>
				<li>
					<a href=\"debarred.php\">Debarred Students</a>
				</li>
				<li>
					<a href=\"repeater.php\">Repeater Management</a>
				</li>
				<li>
					<a href=\"admit.php\">Admit Card Generation</a>
				</li>
			</ul>
    	</li>";
	}
	?>
	<?php
	if($av==1)
	{
		echo "
    	<li><a href=\"#\">Administration View</a>

        <ul>
            <li>
                <a href=\"a.php\">Access Control</a>
            </li>
			<li>
                <a href=\"teachermgt.php\">Teacher Management</a>
            </li>
        </ul>
    	</li>";
	}
	
	?>
</ul>

