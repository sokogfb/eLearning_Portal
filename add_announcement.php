<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<html>

<body id="class_div">
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('teacher_add_announcement_sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">

					<!-- block -->
					<div class="block">
						<div class="navbar navbar-inner block-header">
							<div id="count_class" class="muted pull-right"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span8">
								<form class="" id="add_downloadble" method="post">
									<div class="control-group">
										<div class="controls">
											<textarea name="content" id="ckeditor_full"></textarea>
										</div>
									</div>
									<script>
										jQuery(document).ready(function($) {
											$("#add_downloadble").submit(function(e) {
												e.preventDefault();
												var formData = $(this).serialize();
												$.ajax({
													type: "POST",
													url: "add_announcement_save.php",
													data: formData,
													success: function(html) {
														$.jGrowl("Student Successfully Added", {
															header: 'Student Added'
														});
														window.location = 'add_announcement.php';
													}

												});
											});
										});
									</script>
							</div>
							<div class="span4">
								<div class="alert alert-info">Post the notification to one or more classes</div>
								<div class="pull-left">
									<input type="checkbox" name="selectAll" id="checkAll" />Select all
									<script>
										$("#checkAll").click(function() {
											$('input:checkbox').not(this).prop('checked', this.checked);
										});
									</script>
								</div>
								<table cellpadding="0" cellspacing="0" class="table" id="">
									<thead>
										<tr>
											<th></th>
											<th>Program of study</th>
											<th>Course</th>
										</tr>
									</thead>
									<tbody>
										<?php $query = mysqli_query($link, "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_id = '$session_id' and school_year = '$school_year' ") or die(mysqli_error($link));
										$count = mysqli_num_rows($query);
										while ($row = mysqli_fetch_array($query)) {
											$id = $row['teacher_class_id'];
											?>
											<tr id="del<?php echo $id; ?>">
												<td width="30">
													<input id="" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['class_name']; ?></td>
												<td><?php echo $row['subject_title']; ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							<div class="span10">
								<hr>
								<div class="control-group">
									<div class="controls">
										<button name="Upload" type="submit" value="Upload" class="btn btn-info" /><i class="icon-check"></i>&nbsp;Post</button>
									</div>
								</div>
								</form>
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