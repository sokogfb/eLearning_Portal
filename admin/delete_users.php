<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
if (isset($_POST['delete_user'])) {
	$id = $_POST['selector'];
	$N = count($id);
	for ($i = 0; $i < $N; $i++) {
		$result = mysqli_query($link, "DELETE FROM users where user_id='$id[$i]'");
	}
	header("location: admin_user.php");
}
?>