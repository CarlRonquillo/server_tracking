<?php include('header.php'); ?>

	<div class="container">
		<div style ="width:500px;margin:auto;">
			<?php echo form_open('home/save_web_user',['class' => 'form-horizontal']); ?>
				<center><h2>Add Web Server Other User</h2></center>
				<hr/>
				<?php 
					if($error = $this->session->flashdata('response')):
					{						
				?>
					<div class="alert alert-success">
						<span class ="glyphicon glyphicon-info-sign"></span>
						<?php echo $error; ?>
						<?php echo anchor("home/view_web_users/{$WebServerId}","View List"); ?>
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
					<label for="Usertype" class="control-label">User Type</label>
					<?php echo form_input(['type' => 'text','name' => 'Usertype', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('Usertype'),'maxlength' => 50]); ?>
					<span> <?php echo form_error('Usertype') ?> </span>
				</div>
				<div class="form-group">
					<label for="Username" class="control-label">User Name</label>
					<?php echo form_input(['type' => 'text','name' => 'Username', 'class' => 'form-control',
						'autocomplete' => 'on', 'value' => set_value('Username')]); ?>
					<span> <?php echo form_error('Username') ?> </span>
				</div>
				<div class="form-group">
					<label for="Password" class="control-label">Password</label>
					<div class="input-group">
					<?php echo form_input(['type' => 'password','name' => 'Password', 'class' => 'form-control',
						'autocomplete' => 'on','id' => 'Password']); ?>
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