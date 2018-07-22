<?php
include_once("checker.php");
?>
<ul>
<?php
	if($cv==1 || $av==1)
	{
		echo "
    	<li>Clerk View
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
</ul>

