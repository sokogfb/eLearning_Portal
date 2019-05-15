		<!-- Modal -->
		<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close icon-check" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Delete assignment</h3>
			</div>
			<div class="modal-body">
				<div class="modal-danger">
					Are you sure you want to delete the assignment?
				</div>
			</div>
			<div class="modal-footer">
				<form method="post" action="delete_assignment.php">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cancel</button>
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="hidden" name="get_id" value="<?php echo $get_id; ?>">
					<button class="btn btn-danger" name="change"><i class="icon-check icon-large"></i> Yes</button>
				</form>
			</div>
		</div>