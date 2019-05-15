<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php include('admin/dbcon.php'); ?>
<?php
$id = $_POST['id'];
mysqli_query($link, "delete from message_sent where message_sent_id = '$id'") or die(mysqli_error($link));
?>

