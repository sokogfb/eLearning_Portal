<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<div class="row-fluid">
  <a href="admin_user.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Create new admin</a>
  <!-- block -->
  <div class="block">
    <div class="navbar navbar-inner block-header">
      <div class="muted pull-left">Edit admin</div>
    </div>
    <div class="block-content collapse in">
      <div class="span12">
        <?php
        $query = mysqli_query($link, "select * from users where user_id = '$get_id'") or die(mysqli_error($link));
        $row = mysqli_fetch_array($query);
        ?>
        <form method="post">
          <div class="control-group">
            <div class="controls">
              <input class="input focused" value="<?php echo $row['firstname']; ?>" name="firstname" id="focusedInput" type="text" placeholder="Firsname" required>
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <input class="input focused" value="<?php echo $row['lastname']; ?>" name="lastname" id="focusedInput" type="text" placeholder="Lastname" required>
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <input class="input focused" value="<?php echo $row['username']; ?>" name="username" id="focusedInput" type="text" placeholder="Username" required>
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <button name="update" class="btn btn-info"><i class="icon-save icon-large"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /block -->
</div>
<?php
if (isset($_POST['update'])) {

  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $username = $_POST['username'];

  mysqli_query($link, "update users set username = '$username'  , firstname = '$firstname' , lastname = '$lastname' where user_id = '$get_id' ") or die(mysqli_error($link));

  mysqli_query($link, "insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit User $username')") or die(mysqli_error($link));
  ?>
  <script>
    window.location = "admin_user.php";
  </script>
<?php
}
?>