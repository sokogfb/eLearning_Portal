<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($link, "SELECT * FROM users WHERE username='$username' AND password='$password'") or die(mysqli_error($link));
$count = mysqli_num_rows($query);
$row = mysqli_fetch_array($query);

if ($count > 0) {

	$_SESSION['id'] = $row['user_id'];

	echo 'true';

	mysqli_query($link, "insert into user_log (username,login_date,user_id)values('$username',NOW()," . $row['user_id'] . ")") or die(mysqli_error($link));
} else {
	echo 'false';
}

?>