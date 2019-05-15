<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<div class="span3" id="sidebar">
	<img id="avatar" class="img-polaroid" src="admin/<?php echo $row['location']; ?>">
	<?php include('count.php'); ?>
	<ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
		<li class=""><a href="dashboard_student.php"><i class="icon-book"></i>&nbsp;Classes</a></li>
		<li class="">
			<a href="student_notification.php"><i class="icon-info-sign"></i>&nbsp;Notifications
				<?php if ($not_read == '0') { } else { ?>
					<span class="badge badge-important"><?php echo $not_read; ?></span>
				<?php } ?>
			</a>
		</li>
		<?php
		$message_query = mysqli_query($link, "select * from message where reciever_id = '$session_id' and message_status != 'read' ") or die(mysqli_error($link));
		$count_message = mysqli_num_rows($message_query);
		?>
		<li class="active">
			<a href="student_message.php"><i class="icon-envelope-alt"></i>&nbsp;Messages
				<?php if ($count_message == '0') { } else { ?>
					<span class="badge badge-important"><?php echo $count_message; ?></span>
				<?php } ?>
			</a>
		</li>
	</ul>
</div>