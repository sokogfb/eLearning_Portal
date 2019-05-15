<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar_student.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('change_password_sidebar_student.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					
					<ul class="breadcrumb">
						<li><a href="#"><b>Change password</b></a><span class="divider">/</span></li>
					</ul>
					
					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<div class="alert alert-info"><i class="icon-info-sign"></i> Please fill the required fields</div>
								<?php
								$query = mysqli_query($link, "select * from student where student_id = '$session_id'") or die(mysqli_error($link));
								$row = mysqli_fetch_array($query);
								?>

								<form method="post" id="change_password" class="form-horizontal">
									<div class="control-group">
										<label class="control-label" for="inputEmail">Current password</label>
										<div class="controls">
											<input type="hidden" id="password" name="password" value="<?php echo $row['password']; ?>" placeholder="Current Password">
											<input type="password" id="current_password" name="current_password" placeholder="Current Password">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">New password</label>
										<div class="controls">
											<input type="password" id="new_password" name="new_password" placeholder="New Password">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputPassword">Re-type password</label>
										<div class="controls">
											<input type="password" id="retype_password" name="retype_password" placeholder="Re-type Password">
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
									</div>
								</form>

								<script>
									jQuery(document).ready(function() {
										jQuery("#change_password").submit(function(e) {
											e.preventDefault();

											var password = jQuery('#password').val();
											var current_password = jQuery('#current_password').val();
											var new_password = jQuery('#new_password').val();
											var retype_password = jQuery('#retype_password').val();
											if (password != current_password) {
												$.jGrowl("Password does not match with your current password  ", {
													header: 'Change Password Failed'
												});
											} else if (new_password != retype_password) {
												$.jGrowl("Password does not match with your new password  ", {
													header: 'Change Password Failed'
												});
											} else if ((password == current_password) && (new_password == retype_password)) {
												var formData = jQuery(this).serialize();
												$.ajax({
													type: "POST",
													url: "update_password_student.php",
													data: formData,
													success: function(html) {

														$.jGrowl("Your password is successfully changed", {
															header: 'Change Password Success'
														});
														var delay = 2000;
														setTimeout(function() {
															window.location = 'dashboard_student.php'
														}, delay);

													}
												});

											}
										});
									});
								</script>

							</div>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
		</div>
	</div>
	<?php include('script.php'); ?>
</body>

</html>