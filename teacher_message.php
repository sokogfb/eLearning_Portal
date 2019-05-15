<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('teacher_message_sidebar.php'); ?>
			<div class="span6" id="content">
				<div class="row-fluid">

					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left">
								<div class="tabs">
									<ul class="nav nav-tabs">
										<li class="active"><a href="teacher_message.php"><i class="icon-inbox"></i>Inbox</a></li>
										<li class=""><a href="sent_message.php"><i class="icon-envelope-alt"></i>Sent items </a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">

								<?php
								$query_announcement = mysqli_query($link, "select * from message
																	LEFT JOIN teacher ON teacher.teacher_id = message.sender_id
																	where  message.reciever_id = '$session_id' order by date_sended DESC
																	") or die(mysqli_error($link));
								$count_my_message = mysqli_num_rows($query_announcement);
								if ($count_my_message != '0') {
									while ($row = mysqli_fetch_array($query_announcement)) {
										$id = $row['message_id'];
										$sender_id = $row['sender_id'];
										$sender_name = $row['sender_name'];
										$reciever_name = $row['reciever_name'];
										?>
										<div class="post" id="del<?php echo $id; ?>">

											<div class="message_content">
												<?php echo $row['content']; ?>
											</div>

											<hr>
											Sent by: <strong><?php echo $row['sender_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
											<div class="pull-right">
												<a class="btn btn-link" href="#reply<?php echo $id; ?>" data-toggle="modal"><i class="icon-reply"></i> Reply </a>
											</div>
											<div class="pull-right">
												<a class="btn btn-link" href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-remove"></i> Remove </a>
												<?php include("remove_inbox_message_modal.php"); ?>
												<?php include("reply_inbox_message_modal.php"); ?>
											</div>
										</div>

									<?php }
							} else { ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> There are no messages to show.</div>
								<?php } ?>
							</div>
						</div>
					</div>
					<!-- /block -->
				</div>

				<script type="text/javascript">
					$(document).ready(function() {
						$('.remove').click(function() {
							var id = $(this).attr("id");
							$.ajax({
								type: "POST",
								url: "remove_inbox_message.php",
								data: ({
									id: id
								}),
								cache: false,
								success: function(html) {
									$("#del" + id).fadeOut('slow', function() {
										$(this).remove();
									});
									$('#' + id).modal('hide');
									$.jGrowl("Your Message is Successfully Deleted", {
										header: 'Message Deleted'
									});
								}
							});
							return false;
						});
					});
				</script>
				<script>
					jQuery(document).ready(function() {
						jQuery("#reply").submit(function(e) {
							e.preventDefault();
							var id = $('.reply').attr("id");
							var _this = $(e.target);
							var formData = jQuery(this).serialize();
							$.ajax({
								type: "POST",
								url: "reply.php",
								data: formData,
								success: function(html) {
									$.jGrowl("Message Successfully Sent", {
										header: 'Message Sent'
									});
									$('#reply' + id).modal('hide');
								}

							});
							return false;
						});
					});
				</script>

			</div>
			<?php include('create_message.php') ?>
		</div>
	</div>
	<?php include('script.php'); ?>
</body>

</html>