<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($link, "delete from teacher_class_announcements where teacher_class_announcements_id = '$id'") or die(mysqli_error($link));
mysqli_query($link, "delete from teacher_class_announcements where teacher_class_announcements_id = '$id'") or die(mysqli_error($link));
?>

