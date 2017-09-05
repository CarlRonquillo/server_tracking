<?php include('header.php'); ?>

	<div class="container">
		<div style ="width:500px;margin:auto;">
			<?php echo form_open('home/save_updatelog',['class' => 'form-horizontal']); ?>
				<center><h2>Add Host Server Update Log</h2></center>
				<hr/>
				<?php 
					if($error = $this->session->flashdata('response')):
					{						
				?>
					<div class="alert alert-success">
						<span class ="glyphicon glyphicon-info-sign"></span>
						<?php echo $error; ?>
						<?php echo anchor("home/view_updatelogs/{$HostServerId}","View List"); ?>
					</div>
				<?php 
					}
					endif
				?>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="FK_HostServerId" class="control-label">Host Server Name</label>
						<?php
							$hosts = array();
							foreach($records as $record)
							{
								$hosts[$record->HostServerId]=$record->HostServerName;
							}
						echo form_dropdown(['name' => 'FK_HostServerId', 'class' => 'form-control',
							'autocomplete' => 'on'],$hosts,$HostServerId); ?>
						<span> <?php echo form_error('FK_HostServerId') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="Title" class="control-label">Title</label>
						<?php echo form_input(['type' => 'text','name' => 'Title', 'class' => 'form-control',
							'autocomplete' => 'off', 'value' => set_value('Title'),'maxlength' => 50]); ?>
						<span> <?php echo form_error('Title') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="Notes" class="control-label">Notes</label>
						<?php echo form_textarea(['type' => 'text','name' => 'Notes', 'class' => 'form-control',
							'autocomplete' => 'on', 'value' => set_value('Notes')]); ?>
						<span> <?php echo form_error('Notes') ?> </span>
					</div>
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