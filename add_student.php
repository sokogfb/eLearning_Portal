<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('class_sidebar.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">
					<!-- breadcrumb -->
					<div class="pull-right">
						<a href="my_students.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
					</div>
					<?php $class_query = mysqli_query($link, "select * from teacher_class
										LEFT JOIN class ON class.class_id = teacher_class.class_id
										LEFT JOIN subject ON subject.subject_id = teacher_class.subject_id
										where teacher_class_id = '$get_id'") or die(mysqli_error($link));
					$class_row = mysqli_fetch_array($class_query);
					?>

					<ul class="breadcrumb">
						<li><a href="#"><?php echo $class_row['class_name']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><?php echo $class_row['subject_title']; ?></a> <span class="divider">/</span></li>
						<li><a href="#"><b>Students</b></a><span class="divider"></span></li>
						
					</ul>

					<!-- end breadcrumb -->

					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-left"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form method="post" action="">
									<button name="submit" type="submit" class="btn btn-info"><i class="icon-save"></i>&nbsp;Add Student</button>
									<br>
									<br>

									<table cellpadding="0" cellspacing="0" class="table" id="example">

										<thead>

											<tr>
												<th>Name</th>
												<th>Program of study</th>
												
											</tr>
										</thead>
										<tbody>

											<?php
											$a = 0;
											$query = mysqli_query($link, "select * from student LEFT JOIN class on class.class_id = student.class_id
												
										") or die(mysqli_error($link));
											while ($row = mysqli_fetch_array($query)) {
												$id = $row['student_id'];
												$a++;

												?>

												<tr>
													<input type="hidden" name="test" value="<?php echo $a; ?>">
													<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
													<td><?php echo $row['class_name']; ?></td>

													

												<?php } ?>

											</tr>

										</tbody>
									</table>

								</form>


								<?php

								if (isset($_POST['submit'])) {

									$test = $_POST['test'];
									for ($b = 1; $b <=  $test; $b++) {

										$test1 = "student_id" . $b;
										$test2 = "class_id" . $b;
										$test3 = "teacher_id" . $b;
										$test4 = "add_student" . $b;

										$id = $_POST[$test1];
										$class_id = $_POST[$test2];
										$teacher_id = $_POST[$test3];
										$Add = $_POST[$test4];

										$query = mysqli_query($link, "select * from teacher_class_student where student_id = '$id' and teacher_class_id = '$class_id' ") or die(mysqli_error($link));
										$count = mysqli_num_rows($query);

										if ($count > 0) { ?>
											<script>
												alert('Student Already in the class');
											</script>
											<script>
												window.location = "add_student.php<?php echo '?id=' . $get_id; ?>";
											</script>

										<?php
									} else  
	if ($Add == 'Add') {


										mysqli_query($link, "insert into teacher_class_student (student_id,teacher_class_id,teacher_id) values('$id','$class_id','$teacher_id') ") or die(mysqli_error($link));
									} else { }



									?>
										<script>
											window.location = "my_students.php<?php echo '?id=' . $get_id; ?>";
										</script>

									<?php
								}
							}


							?>





								</tbody>
								</table>

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