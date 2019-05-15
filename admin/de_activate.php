<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
$get_id = $_GET['id'];
mysqli_query($link, "update teacher set teacher_stat = 'Deactivated' where teacher_id = '$get_id'");
header('location:teachers.php');
?>