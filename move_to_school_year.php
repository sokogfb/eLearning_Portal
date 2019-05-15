<?php $link = mysqli_connect("localhost", "root", "", "capstone"); ?>
<!-- user delete modal -->
<div id="user_delete" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header modal-info">
		<button type="button" class="close icon-remove" data-dismiss="modal" aria-hidden="true"></button>
		<h3 id="myModalLabel">Copy file</h3>
	</div>
	<div class="modal-body">

		<center>
			<div class="control-group">
				<label>Move the file to academic year:</label>
				<div class="controls">
					<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
					<select name="school_year" class="">
						<option></option>
						<?php
						$query1 = mysqli_query($link, "select * from teacher_class where class_id ='$class_id' and school_year != '$school_year'") or die(mysqli_error($link));
						while ($row = mysqli_fetch_array($query1)) {

							?>
							<option><?php echo $row['school_year']; ?></option>
							<input type="hidden" name="teacher_class_id" value="<?php echo $row['teacher_class_id']; ?>">
						<?php } ?>
					</select>
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button name="delete_user" class="btn btn-info"><i class="icon-copy"></i> Copy</button>
				</div>
			</div>
		</center>


		<center>
			<div class="control-group">
				<label></label>
				<div class="control-group">
					<div class="controls">
						<p>Share the file to:</p>
						<div class="control-group">
							
							<div class="controls">
								<select name="teacher_id1" class="" required>
									<option></option>
									<?php
									$query = mysqli_query($link, "select * from teacher order by firstname");
									while ($row = mysqli_fetch_array($query)) {

										?>

										<option value="<?php echo $row['teacher_id']; ?>"><?php echo $row['firstname']; ?> <?php echo $row['lastname']; ?> </option>

									<?php } ?>
								</select>

							</div>
						</div>

						<button name="share" class="btn btn-info"><i class="icon-copy"></i> Share</button>
					</div>
				</div>
			</div>


		</center>


	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cancel</button>

	</div>
</div>