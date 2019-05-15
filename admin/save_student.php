<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
$un = $_POST['un'];
$fn = $_POST['fn'];
$ln = $_POST['ln'];
$class_id = $_POST['class_id'];

mysqli_query($link, "insert into student (username,firstname,lastname,location,class_id,status)
		values ('$un','$fn','$ln','uploads/NO-IMAGE-AVAILABLE.jpg','$class_id','Unregistered')                                    
		") or die(mysqli_error($link)); ?>
<?php    ?>