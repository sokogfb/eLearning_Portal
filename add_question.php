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
							<div id="" class="muted pull-right">
								<a href="quiz_question.php<?php echo '?id=' . $get_id; ?>" class="btn btn-info"><i class="icon-arrow-left"></i> Back</a>
							</div>
						</div>
						<div class="block-content collapse in">
							<div class="span12">
								<form class="form-horizontal" method="post">
									<div class="control-group">
										<label class="control-label" for="inputPassword">Question</label>
										<div class="controls">
											<textarea name="question" id="ckeditor_full" required></textarea>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputEmail">Type of question</label>
										<div class="controls">
											<select id="qtype" name="question_tpye" required>
												<option value=""></option>
												<?php
												$query_question = mysqli_query($link, "select * from question_type") or die(mysqli_error($link));
												while ($query_question_row = mysqli_fetch_array($query_question)) {
													?>
													<option value="<?php echo $query_question_row['question_type_id']; ?>"><?php echo $query_question_row['question_type'];  ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="inputEmail"></label>
										<div class="controls">
											<div id="opt11">
												A: <input type="text" name="ans1" size="60"> <input name="answer" value="A" type="radio"><br><br>
												B: <input type="text" name="ans2" size="60"> <input name="answer" value="B" type="radio"><br><br>
												C: <input type="text" name="ans3" size="60"> <input name="answer" value="C" type="radio"><br><br>
												D: <input type="text" name="ans4" size="60"> <input name="answer" value="D" type="radio"><br><br>
											</div>
											<div id="opt12">
												<input name="correctt" value="True" type="radio">E Vertete<br /><br />
												<input name="correctt" value="False" type="radio">E Gabuar<br /><br />
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
									</div>
								</form>
								<?php
								if (isset($_POST['save'])) {
									$question = $_POST['question'];
									$points = $_POST['points'];
									$type = $_POST['question_tpye'];
									$answer = $_POST['answer'];

									$ans1 = $_POST['ans1'];
									$ans2 = $_POST['ans2'];
									$ans3 = $_POST['ans3'];
									$ans4 = $_POST['ans4'];

									if ($type  == '2') {
										mysqli_query($link, "insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) 
			values('$get_id','$question',NOW(),'" . $_POST['correctt'] . "','$type')") or die(mysqli_error($link));
									} else {

										mysqli_query($link, "insert into quiz_question (quiz_id,question_text,date_added,answer,question_type_id) 
		values('$get_id','$question',NOW(),'$answer','$type')") or die(mysqli_error($link));
										$query = mysqli_query($link, "select * from quiz_question order by quiz_question_id DESC LIMIT 1") or die(mysqli_error($link));
										$row = mysqli_fetch_array($query);
										$quiz_question_id = $row['quiz_question_id'];

										mysqli_query($link, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans1','A')") or die(mysqli_error($link));
										mysqli_query($link, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans2','B')") or die(mysqli_error($link));
										mysqli_query($link, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans3','C')") or die(mysqli_error($link));
										mysqli_query($link, "insert into answer (quiz_question_id,answer_text,choices) values('$quiz_question_id','$ans4','D')") or die(mysqli_error($link));
									}

									?>
									<script>
										window.location = 'quiz_question.php<?php echo '?id=' . $get_id; ?>'
									</script>
								<?php
							}
							?>
							</div>
						</div>
					</div>
					<!-- /block -->
				</div>
			</div>
		</div>
		<script>
			jQuery(document).ready(function() {
				jQuery("#opt11").hide();
				jQuery("#opt12").hide();
				jQuery("#opt13").hide();

				jQuery("#qtype").change(function() {
					var x = jQuery(this).val();
					if (x == '1') {
						jQuery("#opt11").show();
						jQuery("#opt12").hide();
						jQuery("#opt13").hide();
					} else if (x == '2') {
						jQuery("#opt11").hide();
						jQuery("#opt12").show();
						jQuery("#opt13").hide();
					} else {
						jQuery("#opt11").hide();
						jQuery("#opt12").hide();
						jQuery("#opt13").hide();
					}
				});

			});
		</script>
	</div>
	<?php include('script.php'); ?>
</body>

</html>