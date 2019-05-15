<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<?php
$get_id = $_GET['id'];
mysqli_query($link, "delete from event where event_id = '$get_id'")or die(mysqli_error($link));
?>
<script>
window.location = 'calendar_of_events.php';
</script>