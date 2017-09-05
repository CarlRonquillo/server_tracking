<?php include('header.php'); ?>

	<div class="container">
		<div style ="width:500px;margin:auto;">
			<?php echo form_open('home/save_web_updatelog',['class' => 'form-horizontal']); ?>
				<center><h2>Add Web Server Update Log</h2></center>
				<hr/>
				<?php 
					if($error = $this->session->flashdata('response')):
					{						
				?>
					<div class="alert alert-success">
						<span class ="glyphicon glyphicon-info-sign"></span>
						<?php echo $error; ?>
						<?php echo anchor("home/view_web_updatelogs/{$WebServerId}","View List"); ?>
					</div>
				<?php
					}
					endif
				?>

				<div class="form-group">
					<label for="FK_WebServerID" class="control-label">Web Server Name</label>
					<?php
						$webs = array();
						foreach($records as $record)
						{
							$webs[$record->WebServerId]=$record->WebServerName;
						}
					echo form_dropdown(['name' => 'FK_WebServerID', 'class' => 'form-control',
						'autocomplete' => 'on'],$webs,$WebServerId); ?>
					<span> <?php echo form_error('FK_WebServerID') ?> </span>
				</div>
				<div class="form-group">
					<label for="Title" class="control-label">Title</label>
					<?php echo form_input(['type' => 'text','name' => 'Title', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('Title'),'maxlength' => 50]); ?>
					<span> <?php echo form_error('Title') ?> </span>
				</div>
				<div class="form-group">
					<label for="Notes" class="control-label">Notes</label>
					<?php echo form_textarea(['type' => 'text','name' => 'Notes', 'class' => 'form-control',
						'autocomplete' => 'on', 'value' => set_value('Notes')]); ?>
					<span> <?php echo form_error('Notes') ?> </span>
				</div>
				<div class="form-group">
					<?php echo form_submit(['value' => 'Save','class' => 'btn btn-primary']); ?>
					&nbsp;&nbsp; <?php echo anchor("home/index","View List"); ?>
				</div>
				<hr/>
			<?php echo form_close(); ?>
		</div>		
	</div>

<?php include('footer.php'); ?>