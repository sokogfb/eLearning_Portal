<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
include('session.php');
mysqli_query($link, "update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysqli_error($link));

 session_destroy();
header('location:index.php'); 
?>