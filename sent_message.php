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
										<li class=""><a href="teacher_message.php"><i class="icon-inbox"></i>Inbox</a></li>
										<li class="active"><a href="sent_message.php"><i class="icon-envelope-alt"></i>Sent items </a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">

								<?php
								$query_announcement = mysqli_query($link, "select * from message_sent
																	LEFT JOIN teacher ON teacher.teacher_id = message_sent.reciever_id
																	where  sender_id = '$session_id'  order by date_sended DESC
																	") or die(mysqli_error($link));
								$count_my_message = mysqli_num_rows($query_announcement);
								if ($count_my_message != '0') {
									while ($row = mysqli_fetch_array($query_announcement)) {
										$id = $row['message_sent_id'];
										?>
										<div class="post" id="del<?php echo $id; ?>">
											<?php echo $row['content']; ?>
											<hr>
											Sent to: <strong><?php echo $row['reciever_name']; ?></strong>
											<i class="icon-calendar"></i> <?php echo $row['date_sended']; ?>
											<div class="pull-right">
												<a class="btn btn-link" href="#<?php echo $id; ?>" data-toggle="modal"><i class="icon-remove"></i> Remove </a>
												<?php include("remove_sent_message_modal.php"); ?>
											</div>
										</div>
									<?php }
							} else { ?>
									<div class="alert alert-info"><i class="icon-info-sign"></i> There are no messages to show. </div>
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
								url: "remove_sent_message.php",
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
										header: 'Message Delete'
									});
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