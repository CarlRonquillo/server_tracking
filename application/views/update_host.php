<?php include('header.php'); ?>
	<div class="container-fluid">
		<div style ="width:500px;margin:auto;">
		<center><h2>Edit Host Server</h2>
		<?php $this->load->model('CrudModel');
			$webcount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','webserver');
			$logsCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','serverupdatelog');
			$usersCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','otherusers');
		?>

			<?php echo anchor("home/view_webserver/{$record->HostServerId}","{$webcount} <i class='glyphicon glyphicon-hdd'></i>",["class"=>"btn btn-default"]); ?>
			<?php echo anchor("home/view_updatelogs/{$record->HostServerId}","{$logsCount} <i class='glyphicon glyphicon-file'></i>",["class"=>"btn btn-default"]); ?>
			<?php echo anchor("home/view_host/{$record->HostServerId}","{$usersCount} <i class='glyphicon glyphicon-user'></i>",["class"=>"btn btn-default"]); ?>
			<?php echo form_open("home/update_host/{$record->HostServerId}",['class' => 'form-horizontal']); ?>
		</center><hr>
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
				endif;
				?>

				<div class="form-group">
					<label for="HostServerName" class="control-label">Host Server Name</label>
					<?php echo form_input(['type' => 'text','name' => 'HostServerName', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 20],$record->HostServerName); ?>
					<span> <?php echo form_error('HostServerName') ?> </span>
				</div>
				<div class="form-group">
					<label for="CommonName" class="control-label">Common Name</label>
					<?php echo form_input(['type' => 'text','name' => 'CommonName', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255],$record->CommonName); ?>
					<span> <?php echo form_error('CommonName') ?> </span>
				</div>
				<div class="form-group">
					<label for="Purpose" class="control-label">Purpose</label>
					<?php echo form_input(['type' => 'text','name' => 'Purpose', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255],$record->Purpose); ?>
					<span> <?php echo form_error('Purpose') ?> </span>
				</div>
				<div class="form-group">
					<label for="Description" class="control-label">Description</label>
					<?php echo form_input(['type' => 'text','name' => 'Description', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255],$record->Description); ?>
					<span> <?php echo form_error('Description') ?> </span>
				</div>	
				<div class="form-group">
					<label for="VirtualPhysical" class="control-label">Server Type</label><br>
					<?php echo form_radio('VirtualPhysical', 'V', 'checked', 'id=virtual')."Virtual"; ?>
					<?php echo form_radio('VirtualPhysical', 'P', null, 'id=physical')."Physical"; ?>
				</div>
				<div class="form-group">
					<label for="VirtualHost" class="control-label">Virtual Host</label>
					<?php echo form_input(['type' => 'text','name' => 'VirtualHost', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 50],$record->VirtualHost); ?>
					<span> <?php echo form_error('VirtualHost') ?> </span>
				</div>
				<div class="form-group">
					<label for="AssignedDepartment" class="control-label">Assigned Department</label>
					<?php echo form_input(['type' => 'text','name' => 'AssignedDepartment', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 50],$record->AssignedDepartment); ?>
					<span> <?php echo form_error('AssignedDepartment') ?> </span>
				</div>
				<div class="form-group">
					<label for="OS" class="control-label">OS</label>
					<?php
						$os = array("Windows","Ubuntu","Centos");
						/*foreach($records as $record)
						{
							$vendors[$record->id]=$record->tVendorCode;
						}*/
					echo form_dropdown(['name' => 'OS', 'class' => 'form-control',
						'autocomplete' => 'off'],$os); ?>
					<span> <?php echo form_error('OS') ?> </span>
				</div>
				<div class="form-group">
					<label for="OSVersion" class="control-label">OS Version</label>
					<?php echo form_input(['type' => 'text','name' => 'OSVersion', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 20],$record->OSVersion); ?>
					<span> <?php echo form_error('OSVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="IPv4AddressInternal" class="control-label">IPv4 Address Internal</label>
					<?php echo form_input(['type' => 'text','name' => 'IPv4AddressInternal', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 15],$record->IPv4AddressInternal); ?>
					<span> <?php echo form_error('IPv4AddressInternal') ?> </span>
				</div>
				<div class="form-group">
					<label for="IPV4AddressExternal" class="control-label">IPv4 Address External</label>
					<?php echo form_input(['type' => 'text','name' => 'IPV4AddressExternal', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 15],$record->IPV4AddressExternal); ?>
					<span> <?php echo form_error('IPV4AddressExternal') ?> </span>
				</div>
				<div class="form-group">
					<label for="PortsOpen" class="control-label">Ports Open</label>
					<?php echo form_input(['type' => 'text','name' => 'PortsOpen', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255],$record->PortsOpen); ?>
					<span> <?php echo form_error('PortsOpen') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigInstalled" class="control-label">ISP Config Installed</label><br>
					<?php echo form_radio('ISPConfigInstalled', 'Y', 'checked', 'id=Yes')."Yes"; ?>
					<?php echo form_radio('ISPConfigInstalled', 'N', null, 'id=No')."No"; ?>
				</div>
				<div class="form-group">
					<label for="ISPConfigVersion" class="control-label">ISP Config Version</label>
					<?php echo form_input(['type' => 'text','name' => 'ISPConfigVersion', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 10],$record->ISPConfigVersion); ?>
					<span> <?php echo form_error('ISPConfigVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigAdminUsername" class="control-label">ISP Config Admin Username</label>
					<?php echo form_input(['type' => 'text','name' => 'ISPConfigAdminUsername', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 20],$record->ISPConfigAdminUsername); ?>
					<span> <?php echo form_error('ISPConfigAdminUsername') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigAdminPassword" class="control-label">ISP Config Admin Password</label>
					<div class="input-group">
					<?php echo form_input(['type' => 'password','name' => 'ISPConfigAdminPassword', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255,'aria-describedby' => 'basic-addon2','id' => 'ISPConfigAdminPassword'],$record->ISPConfigAdminPassword); ?>
					<span class="input-group-btn">
        				<button class="btn btn-default" type="button" id="eye" onmousedown="mouseDown('eye','ISPConfigAdminPassword')" onmouseup="mouseUp('eye','ISPConfigAdminPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
      				</span>
					</div>
					<span> <?php echo form_error('ISPConfigAdminPassword') ?> </span>
				</div>
				<div class="form-group">
					<label for="Database" class="control-label">Database</label>
					<?php
						$database = array("MySQL","Maria","SQLServer","Postgress","Multi");
						/*foreach($records as $record)
						{
							$vendors[$record->id]=$record->tVendorCode;
						}*/
					echo form_dropdown(['name' => 'Database', 'class' => 'form-control',
						'autocomplete' => 'off'],$database); ?>
					<span> <?php echo form_error('Database') ?> </span>
				</div>
				<div class="form-group">
					<label for="DatabaseVersion" class="control-label">Database Version</label>
					<?php echo form_input(['type' => 'text','name' => 'DatabaseVersion', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 10],$record->DatabaseVersion); ?>
					<span> <?php echo form_error('DatabaseVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="MailEnabled" class="control-label">Mail Enabled</label><br>
					<?php echo form_radio('MailEnabled', 'Y', 'checked', 'id=Yes')."Yes"; ?>
					<?php echo form_radio('MailEnabled', 'N', null, 'id=No')."No"; ?>
				</div>
				<div class="form-group">
					<label for="SUUserName" class="control-label">SU Username</label>
					<?php echo form_input(['type' => 'text','name' => 'SUUserName', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 15],$record->SUUserName); ?>
					<span> <?php echo form_error('SUUserName') ?> </span>
				</div>
				<div class="form-group">
					<label for="SUPassword" class="control-label">SU Password</label>
					<div class="input-group">
					<?php echo form_input(['type' => 'password','name' => 'SUPassword', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255,'aria-describedby' => 'basic-addon2','id' => 'SUPassword'],$record->SUPassword); ?>
					<span class="input-group-btn">
        				<button class="btn btn-default" type="button" id="eye2" onmousedown="mouseDown('eye2','SUPassword')" onmouseup="mouseUp('eye2','SUPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
      				</span>
      				</div>
					<span> <?php echo form_error('SUPassword') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechWebserver" class="control-label">Tech Webserver</label>
					<?php echo form_input(['type' => 'text','name' => 'TechWebserver', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 1],$record->TechWebserver); ?>
					<span> <?php echo form_error('TechWebserver') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechWebserverType" class="control-label">Tech Webserver Type</label>
					<?php echo form_input(['type' => 'text','name' => 'TechWebserverType', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 50],$record->TechWebserverType); ?>
					<span> <?php echo form_error('TechWebserverType') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechJava" class="control-label">Tech Java</label>
					<?php echo form_input(['type' => 'text','name' => 'TechJava', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 1],$record->TechJava); ?>
					<span> <?php echo form_error('TechJava') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechJavaVersion" class="control-label">Tech Java Version</label>
					<?php echo form_input(['type' => 'text','name' => 'TechJavaVersion', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 10],$record->TechJavaVersion); ?>
					<span> <?php echo form_error('TechJavaVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechPHP" class="control-label">Tech PHP</label>
					<?php echo form_input(['type' => 'text','name' => 'TechPHP', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 1],$record->TechPHP); ?>
					<span> <?php echo form_error('TechPHP') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechPHPVersion" class="control-label">Tech PHP Version</label>
					<?php echo form_input(['type' => 'text','name' => 'TechPHPVersion', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 10],$record->TechPHPVersion); ?>
					<span> <?php echo form_error('TechPHPVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechRuby" class="control-label">Tech Ruby</label>
					<?php echo form_input(['type' => 'text','name' => 'TechRuby', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 1],$record->TechRuby); ?>
					<span> <?php echo form_error('TechRuby') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechRubyVersion" class="control-label">Tech Ruby Version</label>
					<?php echo form_input(['type' => 'text','name' => 'TechRubyVersion', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 10],$record->TechRubyVersion); ?>
					<span> <?php echo form_error('TechRubyVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechOther" class="control-label">Tech Other</label>
					<?php echo form_input(['type' => 'text','name' => 'TechOther', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255],$record->TechOther); ?>
					<span> <?php echo form_error('TechOther') ?> </span>
				</div><hr>
			<div class="form-group">
				<?php echo form_submit(['value' => 'Update','class' => 'btn btn-primary']); ?>
						&nbsp;&nbsp;<?php echo anchor("home/index","View List"); ?>
			</div>
		<?php echo form_close(); ?>
		</div>
	</div>

<?php include('footer.php'); ?>