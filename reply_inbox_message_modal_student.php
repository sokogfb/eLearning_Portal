		<!-- Modal -->
		<div id="reply<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header reply_header">
				<button type="button" class="close icon-remove" data-dismiss="modal" aria-hidden="true"></button>
				<h3 id="myModalLabel">Reply</h3>
			</div>
			<div class="modal-body">
				<center>
					<div class="control-group">
						<label class="control-label" for="inputEmail">To:</label>
						<div class="controls">
							<input type="hidden" name="sender_id" id="inputEmail" value="<?php echo $sender_id; ?>" readonly>
							<input type="hidden" name="my_name" value="<?php echo $reciever_name; ?>" readonly>
							<input type="text" name="name_of_sender" id="inputEmail" value="<?php echo $sender_name; ?>" readonly>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputPassword">Content:</label>
						<div class="controls">
							<textarea name="my_message"></textarea>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="reply" id="<?php echo $id; ?>" class="btn btn-info reply"><i class="icon-reply"></i> Reply</button>
						</div>
					</div>
				</center>
			</div>
		</div>