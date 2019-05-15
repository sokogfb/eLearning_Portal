<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
$id = $_POST['id'];
mysqli_query($link, "delete from files where file_id = '$id' ") or die(mysqli_error($link));
?>
