<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<div class="span3" id="sidebar">
    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
        <li> <a href="dashboard.php"><i class="icon-home"></i>&nbsp;Dashboard</a> </li>

        <li class="active">
            <a href="admin_user.php"><i class="icon-user"></i> Admin users</a>
        </li>

        <li>
            <a href="students.php"><i class="icon-group"></i> Student users</a>
        </li>
        <li>
            <a href="teachers.php"><i class="icon-group"></i> Teacher users</a>
        </li>

        <li>
            <a href="school_year.php"><i class="icon-calendar"></i> Academic year</a>
        </li>
    </ul>
</div>