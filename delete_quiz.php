<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
if (isset($_POST['backup_delete'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($link, "DELETE FROM quiz where quiz_id='$id[$i]'");
	}
	header("location: teacher_quiz.php");
}
?>