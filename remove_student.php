<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
include('admin/dbcon.php');
$id = $_POST['id'];
mysqli_query($link, "delete from teacher_class_student where teacher_class_student_id = '$id'") or die(mysqli_error($link));
?>

