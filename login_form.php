			<?php include('header_dashboard.php'); ?>

			<form id="login_form1" class="form-signin" method="post">
				<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign in</h3>
				<input type="text" class="input-block-level" id="username" name="username" placeholder="Username" required>
				<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
				<button data-placement="right" title="Click here to login" id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-signin icon-large"></i> Sign in</button>
				<script type="text/javascript">
					$(document).ready(function() {
						$('#signin').tooltip('show');
						$('#signin').tooltip('hide');
					});
				</script>
			</form>
			<script>
				jQuery(document).ready(function() {
					jQuery("#login_form1").submit(function(e) {
						e.preventDefault();
						var formData = jQuery(this).serialize();
						$.ajax({
							type: "POST",
							url: "login.php",
							data: formData,
							success: function(html) {
								if (html == 'true') {

									$.jGrowl("Welcome to E-Learning ");
									var delay = 1000;
									setTimeout(function() {
										window.location = 'dasboard_teacher.php'
									}, delay);
								} else if (html == 'true_student') {
									$.jGrowl("Welcome to E-Learning ");
									var delay = 1000;
									setTimeout(function() {
										window.location = 'dashboard_student.php'
									}, delay);
								} else {
									$.jGrowl("Please Check your username and Password", {
										header: 'Login Failed'
									});
								}
							}
						});
						return false;
					});
				});
			</script>
			<div id="button_form" class="form-signin"> 

				<h3 class="form-signin-heading"><i class="icon-edit"></i> Sign up</h3>
				<strong>
					<p>Choose your role and register now </strong></p>

				<button data-placement="top" title="Register as student" id="signin_student" onclick="window.location='signup_student.php'" id="btn_student" name="login" class="btn btn-info" type="submit">Student</button>
				<div class="pull-right">
					<button data-placement="top" title="Register as teacher" id="signin_teacher" onclick="window.location='signup_teacher.php'" name="login" class="btn btn-info" type="submit">Teacher</button>
				</div>
			</div>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#signin_student').tooltip('show');
					$('#signin_student').tooltip('hide');
				});
			</script>
			<script type="text/javascript">
				$(document).ready(function() {
					$('#signin_teacher').tooltip('show');
					$('#signin_teacher').tooltip('hide');
				});
			</script>
			<?php include('script.php'); ?>