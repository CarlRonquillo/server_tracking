<?php include('header.php'); ?>

	<div class="container">
		<div style ="width:500px;margin:auto;">
			<?php echo form_open("home/update_user/$record->OtherUsersID/{$record->FK_HostServerId}",['class' => 'form-horizontal']); ?>
				<center><h2>Edit Host Server Update Log</h2></center>
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

				<div class="form-group">
					<label for="FK_HostServerID" class="control-label">Host Server Name</label>
					<?php
						$hosts = array();
						foreach($hostCodes as $hostCode)
						{
							$hosts[$hostCode->HostServerId]=$hostCode->HostServerName;
						}
					echo form_dropdown(['name' => 'FK_HostServerID', 'class' => 'form-control',
						'autocomplete' => 'on'],$hosts,$record->FK_HostServerId); ?>
					<span> <?php echo form_error('FK_HostServerID') ?> </span>
				</div>
				<div class="form-group">
					<label for="Usertype" class="control-label">User Type</label>
					<?php echo form_input(['type' => 'text','name' => 'Usertype', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 50],$record->Usertype); ?>
					<span> <?php echo form_error('Usertype') ?> </span>
				</div>
				<div class="form-group">
					<label for="Username" class="control-label">User Name</label>
					<?php echo form_input(['type' => 'text','name' => 'Username', 'class' => 'form-control',
						'autocomplete' => 'on'],$record->Username); ?>
					<span> <?php echo form_error('Username') ?> </span>
				</div>
				<div class="form-group">
					<label for="Password" class="control-label">Password</label>
					<div class="input-group">
					<?php echo form_input(['type' => 'password','name' => 'Password', 'class' => 'form-control',
						'autocomplete' => 'on','id' => 'Password'],$record->Password); ?>
					<span class="input-group-btn">
        				<button class="btn btn-default" type="button" id="eye" onmousedown="mouseDown('eye','Password')" onmouseup="mouseUp('eye','Password')"><i class='glyphicon glyphicon-eye-open'></i></button>
      				</span>
					</div>
					<span> <?php echo form_error('Password') ?> </span>
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