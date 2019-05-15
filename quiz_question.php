<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>

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
									<a href="teacher_quiz.php" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
									<a href="add_question.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info"><i class="icon-plus-sign"></i> Shto Pyetje</a>
								</div>
								<form action="delete_quiz_question.php" method="post">
									<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
									<table cellpadding="0" cellspacing="0" class="table" id="">
										<a data-toggle="modal" href="#backup_delete" id="delete" class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
										<?php include('modal_delete_quiz_question.php'); ?>
										<thead>
											<tr>
												<th></th>
												<th>Question</th>
												<!-- <th>Points</th> -->
												<th>Type of question</th>
												<th>Answer</th>
												<th>Date</th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = mysqli_query($link, "select * FROM quiz_question
										LEFT JOIN question_type on quiz_question.question_type_id = question_type.question_type_id
										where quiz_id = '$get_id'  order by date_added DESC ") or die(mysqli_error($link));
											while ($row = mysqli_fetch_array($query)) {
												$id  = $row['quiz_question_id'];
												?>
												<tr id="del<?php echo $id; ?>">
													<td width="30">
														<input id="optionsCheckbox" class="" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['question_text']; ?></td>
													<td><?php echo $row['question_type']; ?></td>
													<td><?php echo $row['answer']; ?></td>
													<td><?php echo $row['date_added']; ?></td>
													<td width="30"><a href="edit_question.php<?php echo '?id=' . $get_id; ?>&<?php echo 'quiz_question_id=' . $id; ?>" class="btn btn-info"><i class="icon-pencil"></i></a></td>
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