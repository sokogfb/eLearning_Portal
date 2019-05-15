<div class="span3" id="sidebar">
	<img id="avatar" src="admin/<?php echo $row['location']; ?>" class="img-polaroid">
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dasboard_teacher.php"><i class="icon-chevron-left"></i>&nbsp;Back</a></li>
		<li class=""><a href="my_students.php<?php echo '?id=' . $get_id; ?>"><i class="icon-group"></i>&nbsp;Classmates</a></li>
		<li class=""><a href="subject_overview.php<?php echo '?id=' . $get_id; ?>"><i class="icon-file"></i>&nbsp;Information about course</a></li>
		<li class=""><a href="downloadable.php<?php echo '?id=' . $get_id; ?>"><i class="icon-download"></i>&nbsp;Downloads</a></li>

		<li class=""><a href="assignment.php<?php echo '?id=' . $get_id; ?>"><i class="icon-book"></i>&nbsp;Assignment</a></li>
		<li class=""><a href="announcements.php<?php echo '?id=' . $get_id; ?>"><i class="icon-info-sign"></i>&nbsp;Notifications</a></li>
		<li class=""><a href="class_calendar.php<?php echo '?id=' . $get_id; ?>"><i class="icon-calendar"></i>&nbsp;Calendar</a></li>
		<li class="active"><a href="class_quiz.php<?php echo '?id=' . $get_id; ?>"><i class="icon-list"></i>&nbsp;Quiz</a></li>
	</ul>

</div>