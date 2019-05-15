<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?> 
<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class_id = $_POST['class_id'];

$query = mysqli_query($link, "select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'") or die(mysqli_error($link));
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0) {
	mysqli_query($link, "update student set password = '$password', status = 'Registered' where student_id = '$id'") or die(mysqli_error($link));
	$_SESSION['id'] = $id;
	echo 'true';
} else {
	echo 'false';
}
?>