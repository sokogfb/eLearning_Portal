<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?> 
 <?php
    include('dbcon.php');
    include('session.php');
    $new_password  = $_POST['new_password'];
    mysqli_query($link, "update student set password = '$new_password' where student_id = '$session_id'") or die(mysqli_error($link));
    ?>