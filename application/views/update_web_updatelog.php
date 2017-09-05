<?php include('header.php'); ?>

	<div class="container">
		<div style ="width:500px;margin:auto;">
			<?php echo form_open("home/update_web_updatelog/$record->ServerUpdateLogID/{$record->FK_WebServerID}",['class' => 'form-horizontal']); ?>
				<center><h2>Edit Site Update Log</h2></center>
				<hr/>
				<?php 
					if($error = $this->session->flashdata('response')):
					{						
				?>
					<div class="alert alert-success">
						<span class ="glyphicon glyphicon-info-sign"></span>
						<?php echo $error; ?>
					</div>
				<?php 
					}
					endif
				?>

				<div class="row">
					<div class="form-group col-md-6">
						<label for="FK_WebServerID" class="control-label">Site Name</label>
						<?php
							$webs = array();
							foreach($webCodes as $webCode)
							{
								$webs[$webCode->WebServerId]=$webCode->WebServerName;
							}
						echo form_dropdown(['name' => 'FK_HostServerID', 'class' => 'form-control',
							'autocomplete' => 'on'],$webs,$record->FK_WebServerID); ?>
						<span> <?php echo form_error('FK_WebServerID') ?> </span>
					</div>
				</div>
				<div class="form-group">
					<label for="Title" class="control-label">Title</label>
					<?php echo form_input(['type' => 'text','name' => 'Title', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 50],$record->Title); ?>
					<span> <?php echo form_error('Title') ?> </span>
				</div>
				<div class="form-group">
					<label for="Notes" class="control-label">Notes</label>
					<?php echo form_textarea(['type' => 'text','name' => 'Notes', 'class' => 'form-control',
						'autocomplete' => 'on'],$record->Notes); ?>
					<span> <?php echo form_error('Notes') ?> </span>
				</div>
				<div class="form-group">
					<?php echo form_submit(['value' => 'Save','class' => 'btn btn-primary']); ?>
					&nbsp;&nbsp; <?php echo anchor("home/view_web_updatelogs/{$record->FK_WebServerID}","View List"); ?>
				</div>
				<hr/>
			<?php echo form_close(); ?>
		</div>
	</div>

<?php include('footer.php'); ?>