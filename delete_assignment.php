<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
include('admin/dbcon.php');
$id = $_POST['id'];
$get_id = $_POST['get_id'];
mysqli_query($link, "delete from assignment where assignment_id = '$id' ") or die(mysqli_error($link));
?>
<script>
	window.location = 'assignment.php<?php echo '?id=' . $get_id; ?>'
</script>