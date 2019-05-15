<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?> 
<?php
include('session.php');
$content = $_POST['content'];
$id = $_POST['selector'];
$N = count($id);
for ($i = 0; $i < $N; $i++) {
	mysqli_query($link, "insert into teacher_class_announcements (teacher_class_id,teacher_id,content,date) values('$id[$i]','$session_id','$content',NOW())") or die(mysqli_error($link));
	mysqli_query($link, "insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id[$i]','Add Annoucements',NOW(),'announcements_student.php')") or die(mysqli_error($link));
}
?>


