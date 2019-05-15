		<!-- Modal -->
		<div id="myModal_student" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header modal-info">
				<button type="button" class="close icon-remove" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Change photo</h3>
			</div>
			<div class="modal-body">
				<form method="post" action="student_avatar.php" enctype="multipart/form-data">
					<center>
						<div class="control-group">
							<div class="controls">
								<input name="image" class="input-file uniform_on" id="fileInput" type="file" required>
							</div>
						</div>
					</center>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cancel</button>
				<button class="btn btn-info" name="change"><i class="icon-save icon-large"></i> Save</button>
			</div>
			</form>
		</div>