<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>

<body>
	<?php include('navbar_teacher.php'); ?>
	<div class="container-fluid">
		<div class="row-fluid">
			<?php include('quiz_sidebar_teacher.php'); ?>
			<div class="span9" id="content">
				<div class="row-fluid">

					<!-- block -->
					<div id="block_bg" class="block">
						<div class="navbar navbar-inner block-header">
							<div id="" class="muted pull-right"></div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<div class="pull-right">
									<a href="add_quiz.php" class="btn btn-info"><i class="icon-plus-sign"></i> Add quiz</a>
									<td width="30"><a href="add_quiz_to_class.php" class="btn btn-info"><i class="icon-plus-sign"></i> Add quiz to class</a></td>
								</div>

								<form action="delete_quiz.php" method="post">
									<table cellpadding="0" cellspacing="0" class="table" id="">
										<a data-toggle="modal" href="#backup_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
										<?php include('modal_delete_quiz.php'); ?>
										<thead>
											<tr>
												<th></th>
												<th>Name</th>
												<th>Description</th>
												<th>Date</th>
												<th>Questions</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = mysqli_query($link, "select * FROM quiz where teacher_id = '$session_id'  order by date_added DESC ") or die(mysqli_error($link));
											while ($row = mysqli_fetch_array($query)) {
												$id  = $row['quiz_id'];
												?>
												<tr id="del<?php echo $id; ?>">
													<td width="30">
														<input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['quiz_title']; ?></td>
													<td><?php echo $row['quiz_description']; ?></td>
													<td><?php echo $row['date_added']; ?></td>
													<td><a href="quiz_question.php<?php echo '?id=' . $id; ?>">Questions</a></td>
													<td width="30"><a href="edit_quiz.php<?php echo '?id=' . $id; ?>" class="btn btn-info"><i class="icon-pencil"></i></a></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
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