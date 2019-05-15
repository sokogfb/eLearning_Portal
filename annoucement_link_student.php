<div class="span3" id="sidebar">
	<img id="avatar" src="admin/<?php echo $row['location']; ?>" class="img-polaroid">
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dashboard_student.php"><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
		<li class=""><a href="my_classmates.php<?php echo '?id=' . $get_id; ?>"><i class="icon-group"></i>&nbsp;Classmates</a></li>

		<li class=""><a href="subject_overview_student.php<?php echo '?id=' . $get_id; ?>"><i class="icon-file"></i>&nbsp;Information about course</a></li>
		<li class=""><a href="downloadable_student.php<?php echo '?id=' . $get_id; ?>"><i class="icon-download"></i>&nbsp;Downloads</a></li>

		<li class=""><a href="assignment_student.php<?php echo '?id=' . $get_id; ?>"><i class="icon-book"></i>&nbsp;Assignment</a></li>
		<li class="active"><a href="announcements_student.php<?php echo '?id=' . $get_id; ?>"><i class="icon-info-sign"></i>&nbsp;Notifications</a></li>
		<li class=""><a href="class_calendar_student.php<?php echo '?id=' . $get_id; ?>"><i class="icon-calendar"></i>&nbsp;Calendar</a></li>
		<li class=""><a href="student_quiz_list.php<?php echo '?id=' . $get_id; ?>"><i class="icon-reorder"></i>&nbsp;Quiz</a></li>
	</ul>

</div>