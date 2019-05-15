<?php include('header_dashboard.php'); ?>


<form id="signin_student" class="form-signin" method="post">
	<h3 class="form-signin-heading"><i class="icon-lock"></i> Sign up as Student</h3>
	<input type="text" class="input-block-level" id="username" name="username" placeholder="ID Number" required>
	<input type="text" class="input-block-level" id="firstname" name="firstname" placeholder="Firstname" required>
	<input type="text" class="input-block-level" id="lastname" name="lastname" placeholder="Lastname" required>
	<input type="password" class="input-block-level" id="password" name="password" placeholder="Password" required>
	<input type="password" class="input-block-level" id="cpassword" name="cpassword" placeholder="Re-type Password" required>
	<button id="signin" name="login" class="btn btn-info" type="submit"><i class="icon-check icon-large"></i> Sign up</button>
</form>
<script>
	jQuery(document).ready(function() {
		jQuery("#signin_student").submit(function(e) {
			e.preventDefault();

			var password = jQuery('#password').val();
			var cpassword = jQuery('#cpassword').val();

			if (password == cpassword) {
				var formData = jQuery(this).serialize();
				$.ajax({
					type: "POST",
					url: "student_signup.php",
					data: formData,
					success: function(html) {
						if (html == 'true') {
							$.jGrowl("Welcome to E-Learning Portal", {
								header: 'Sign up Success'
							});
							var delay = 2000;
							setTimeout(function() {
								window.location = 'dashboard_student.php'
							}, delay);
						} else if (html == 'false') {
							$.jGrowl("Your data are not found in the database Please Sure to Check Your ID Number or Firstname, Lastname and the Section You Belong. ", {
								header: 'Sign Up Failed'
							});
						}
					}


				});

			} else {
				$.jGrowl("Your data are not found in the database", {
					header: 'Sign Up Failed'
				});
			}
		});
	});
</script>



<a onclick="window.location='index.php'" id="btn_login" name="login" class="btn" type="submit"><i class="icon-signin icon-large"></i> Click here to Login</a>