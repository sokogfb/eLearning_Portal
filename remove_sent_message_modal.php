		<!-- Modal -->
		<div id="<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close icon-remove" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Delete Sent Messages</h3>
			</div>
			<div class="modal-body">
				<div class="modal-danger">
					Are you sure you want to delete sent messages?
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i> Cancel</button>
				<button id="<?php echo $id; ?>" class="btn btn-danger remove" data-dismiss="modal" aria-hidden="true"><i class="icon-check icon-large"></i> Yes</button>
			</div>
		</div>