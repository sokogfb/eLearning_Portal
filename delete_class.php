<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
$get_id = $_POST['id'];
mysqli_query($link, "delete from teacher_class  where  teacher_class_id = '$get_id' ") or die(mysqli_error($link));
mysqli_query($link, "delete from teacher_class_student  where  teacher_class_id = '$get_id' ") or die(mysqli_error($link));
mysqli_query($link, "delete from teacher_class_announcements  where  teacher_class_id = '$get_id' ") or die(mysqli_error($link));
mysqli_query($link, "delete from teacher_notification  where  teacher_class_id = '$get_id' ") or die(mysqli_error($link));
mysqli_query($link, "delete from class_subject_overview where  teacher_class_id = '$get_id' ") or die(mysqli_error($link));
header('location:dasboard_teacher.php');
?>