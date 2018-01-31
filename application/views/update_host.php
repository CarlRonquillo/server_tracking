<?php include('header.php'); ?>
<style type="text/css">
	.row{
		margin-bottom: 15px;
	}
</style>
	<div class="container">
		<center><h2>Edit Host Server</h2>
		<?php $this->load->model('CrudModel');
			$webcount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','webserver');
			$logsCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','serverupdatelog');
			$usersCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','otherusers');
		?>

			<?php echo anchor("home/view_webserver/{$record->HostServerId}","{$webcount} <i class='glyphicon glyphicon-hdd'></i>",["class"=>"btn btn-default","title" => "click to view sites of ".$record->HostServerName]); ?>
			<?php echo anchor("home/view_updatelogs/{$record->HostServerId}","{$logsCount} <i class='glyphicon glyphicon-file'></i>",["class"=>"btn btn-default","title" => "click to view update logs of ".$record->HostServerName]); ?>
			<?php echo anchor("home/view_users/{$record->HostServerId}","{$usersCount} <i class='glyphicon glyphicon-user'></i>",["class"=>"btn btn-default","title" => "click to view users of ".$record->HostServerName]); ?>
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

				<div class="row">
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="HostServerName" class="control-label">Host Server Name</label>
						<?php echo form_input(['type' => 'text','name' => 'HostServerName', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 20],$record->HostServerName); ?>
						<span> <?php echo form_error('HostServerName') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="CommonName" class="control-label">Common Name</label>
						<?php echo form_input(['type' => 'text','name' => 'CommonName', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 255],$record->CommonName); ?>
						<span> <?php echo form_error('CommonName') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="Purpose" class="control-label">Purpose</label>
						<?php echo form_input(['type' => 'text','name' => 'Purpose', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 255],$record->Purpose); ?>
						<span> <?php echo form_error('Purpose') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="AssignedDepartment" class="control-label">Assigned Department</label>
						<?php echo form_input(['type' => 'text','name' => 'AssignedDepartment', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 50],$record->AssignedDepartment); ?>
						<span> <?php echo form_error('AssignedDepartment') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-6" style="margin: auto;">
						<label for="Description" class="control-label">Description</label>
						<?php echo form_input(['type' => 'text','name' => 'Description', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 255],$record->Description); ?>
						<span> <?php echo form_error('Description') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="Location" class="control-label">Location</label>
						<?php
							$_locations = array();
							foreach($Locations as $location)
							{
								$_locations[$location->ListKey]=$location->Value;
							}
						echo form_dropdown(['name' => 'Location', 'class' => 'form-control',
							'autocomplete' => 'off'],$_locations,$record->Location); ?>
						<span> <?php echo form_error('Location') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="ActiveStatus" class="control-label">Active Status</label>
						<?php
							$active_status = array();
							foreach($ActiveStatus as $activeStatus)
							{
								$active_status[$activeStatus->ListKey]=$activeStatus->Value;
							}
						echo form_dropdown(['name' => 'ActiveStatus', 'class' => 'form-control',
							'autocomplete' => 'off'],$active_status,$record->ActiveStatus); ?>
						<span> <?php echo form_error('ActiveStatus') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="VirtualPhysical" class="control-label">Server Type</label>
						<?php
							$serverType = array();
							foreach($VirtualPhysicals as $VirtualPhysical)
							{
								$serverType[$VirtualPhysical->ListKey]=$VirtualPhysical->Value;
							}
						echo form_dropdown(['name' => 'VirtualPhysical', 'class' => 'form-control',
							'autocomplete' => 'off'],$serverType,$record->VirtualPhysical); ?>
						<span> <?php echo form_error('VirtualPhysical') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="VirtualHost" class="control-label">Virtual Host</label>
						<?php echo form_input(['type' => 'text','name' => 'VirtualHost', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 50],$record->VirtualHost); ?>
						<span> <?php echo form_error('VirtualHost') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="OS" class="control-label">OS</label>
						<?php
							$_os = array();
							foreach($OSs as $os)
							{
								$_os[$os->ListKey]=$os->Value;
							}
						echo form_dropdown(['name' => 'OS', 'class' => 'form-control',
							'autocomplete' => 'off'],$_os,$record->OS); ?>
						<span> <?php echo form_error('OS') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="OSVersion" class="control-label">OS Version</label>
						<?php echo form_input(['type' => 'text','name' => 'OSVersion', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 20],$record->OSVersion); ?>
						<span> <?php echo form_error('OSVersion') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="IPv4AddressInternal" class="control-label">IPv4 Address Internal</label>
						<?php echo form_input(['type' => 'text','name' => 'IPv4AddressInternal', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 15],$record->IPv4AddressInternal); ?>
						<span> <?php echo form_error('IPv4AddressInternal') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="IPV4AddressExternal" class="control-label">IPv4 Address External</label>
						<?php echo form_input(['type' => 'text','name' => 'IPV4AddressExternal', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 15],$record->IPV4AddressExternal); ?>
						<span> <?php echo form_error('IPV4AddressExternal') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="PortsOpen" class="control-label">Ports Open</label>
						<?php echo form_input(['type' => 'text','name' => 'PortsOpen', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 255],$record->PortsOpen); ?>
						<span> <?php echo form_error('PortsOpen') ?> </span>
					</div>
				</div>
				<div class ="row">
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="ISPConfigInstalled" class="control-label">ISP Config Installed</label>
						<?php
							$ISPConfigInstalled = array();
							foreach($ISPConfigInstalleds as $_ISPConfigInstalled)
							{
								$ISPConfigInstalled[$_ISPConfigInstalled->ListKey]=$_ISPConfigInstalled->Value;
							}
						echo form_dropdown(['name' => 'ISPConfigInstalled','id' => 'ISPConfigInstalled', 'class' => 'form-control', 'autocomplete' => 'off', 'onchange' => 'ISP_Config_showHide()'],$ISPConfigInstalled,$record->ISPConfigInstalled); ?>
						<span> <?php echo form_error('ISPConfigInstalled') ?> </span>
					</div>
					<div id="ISP_Config">
						<div class="form-group col-md-3" style="margin: auto;">
							<label for="ISPConfigVersion" class="control-label">ISP Config Version</label>
							<?php echo form_input(['type' => 'text','name' => 'ISPConfigVersion', 'class' => 'form-control',
								'autocomplete' => 'off','maxlength' => 10],$record->ISPConfigVersion); ?>
							<span> <?php echo form_error('ISPConfigVersion') ?> </span>
						</div>
						<div class="form-group col-md-3" style="margin: auto;">
							<label for="ISPConfigAdminUsername" class="control-label">ISP Config Admin Username</label>
							<?php echo form_input(['type' => 'text','name' => 'ISPConfigAdminUsername', 'class' => 'form-control',
								'autocomplete' => 'off','maxlength' => 20],$record->ISPConfigAdminUsername); ?>
							<span> <?php echo form_error('ISPConfigAdminUsername') ?> </span>
						</div>
						<div class="form-group col-md-3" style="margin: auto;">
							<label for="ISPConfigAdminPassword" class="control-label">ISP Config Admin Password</label>
							<div class="input-group">
							<?php echo form_input(['type' => 'password','name' => 'ISPConfigAdminPassword', 'class' => 'form-control',
								'autocomplete' => 'off','maxlength' => 255,'aria-describedby' => 'basic-addon2','id' => 'ISPConfigAdminPassword'],$record->ISPConfigAdminPassword); ?>
							<span class="input-group-btn">
		        				<button class="btn btn-default" type="button" id="btnISPConfigAdminPassword" onmousedown="mouseDown('btnISPConfigAdminPassword','ISPConfigAdminPassword')" onmouseup="mouseUp('btnISPConfigAdminPassword','ISPConfigAdminPassword')"><i id ="ISPConfigAdminPassword_eye" class='glyphicon glyphicon-eye-open'></i></button>
		      				</span>
							</div>
							<span> <?php echo form_error('ISPConfigAdminPassword') ?> </span>
						</div>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="Database" class="control-label">Database</label>
						<?php
							$database = array();
							foreach($Databases as $Database)
							{
								$database[$Database->ListKey]=$Database->Value;
							}
						echo form_dropdown(['name' => 'Database', 'class' => 'form-control',
							'autocomplete' => 'off'],$database,$record->Database); ?>
						<span> <?php echo form_error('Database') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="DatabaseVersion" class="control-label">Database Version</label>
						<?php echo form_input(['type' => 'text','name' => 'DatabaseVersion', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 10],$record->DatabaseVersion); ?>
						<span> <?php echo form_error('DatabaseVersion') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="MailEnabled" class="control-label">Mail Enabled</label>
						<?php
							$MailEnabled = array();
							foreach($MailEnableds as $_MailEnabled)
							{
								$MailEnabled[$_MailEnabled->ListKey]=$_MailEnabled->Value;
							}
						echo form_dropdown(['name' => 'MailEnabled', 'class' => 'form-control',
							'autocomplete' => 'off'],$MailEnabled,$record->MailEnabled); ?>
						<span> <?php echo form_error('MailEnabled') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="SUUserName" class="control-label">Admin/Root Username</label>
						<?php echo form_input(['type' => 'text','name' => 'SUUserName', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 15],$record->SUUserName); ?>
						<span> <?php echo form_error('SUUserName') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="SUPassword" class="control-label">Admin/Root Password</label>
						<div class="input-group">
						<?php echo form_input(['type' => 'password','name' => 'SUPassword', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 255,'aria-describedby' => 'basic-addon2','id' => 'SUPassword'],$record->SUPassword); ?>
						<span class="input-group-btn">
	        				<button class="btn btn-default" type="button" id="btnSUPassword" onmousedown="mouseDown('btnSUPassword','SUPassword')" onmouseup="mouseUp('btnSUPassword','SUPassword')" ><i class='glyphicon glyphicon-eye-open'></i></button>
	      				</span>
	      				</div>
						<span> <?php echo form_error('SUPassword') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-1" style="margin: auto;">
						<label for="TechWebserver" class="control-label">
							<?php echo form_checkbox(['name' => 'TechWebserver','value' => '1','maxlength' => 1, 'checked' => $record->TechWebserver, 'id' => 'TechWebserver']); ?> Site</label>
						<span> <?php echo form_error('TechWebserver') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="TechWebserverType" class="control-label">Tech Webserver Type</label>
						<?php
							$TechWebserver = array();
							foreach($TechWebserverTypes as $TechWebserverType)
							{
								$TechWebserver[$TechWebserverType->ListKey]=$TechWebserverType->Value;
							}
						echo form_dropdown(['name' => 'TechWebserverType', 'class' => 'form-control',
							'autocomplete' => 'off'],$TechWebserver,$record->TechWebserverType); ?>
						<span> <?php echo form_error('TechWebserverType') ?> </span>
					</div>
					<div class="form-group col-md-1" style="margin: auto;">
						<label for="TechJava" class="control-label">
							<?php echo form_checkbox(['name' => 'TechJava','value' => '1','maxlength' => 1, 'checked' => $record->TechJava, 'id' => 'TechJava']); ?> Java</label>
						<span> <?php echo form_error('TechJava') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="TechJavaVersion" class="control-label">Java Version</label>
						<?php echo form_input(['type' => 'text','name' => 'TechJavaVersion', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 10],$record->TechJavaVersion); ?>
						<span> <?php echo form_error('TechJavaVersion') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-1" style="margin: auto;">
						<label for="TechPHP" class="control-label">
						<?php echo form_checkbox(['name' => 'TechPHP','value' => '1','maxlength' => 1, 'checked' => $record->TechPHP, 'id' => 'TechPHP']); ?>PHP</label>
						<span> <?php echo form_error('TechPHP') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="TechPHPVersion" class="control-label">PHP Version</label>
						<?php echo form_input(['type' => 'text','name' => 'TechPHPVersion', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 10],$record->TechPHPVersion); ?>
						<span> <?php echo form_error('TechPHPVersion') ?> </span>
					</div>
					<div class="form-group col-md-1" style="margin: auto;">
						<label for="TechRuby" class="control-label">
						<?php echo form_checkbox(['name' => 'TechRuby','value' => '1','maxlength' => 1, 'checked' => $record->TechRuby, 'id' => 'TechRuby']); ?>Ruby</label>
						<span> <?php echo form_error('TechRuby') ?> </span>
					</div>
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="TechRubyVersion" class="control-label">Tech Ruby Version</label>
						<?php echo form_input(['type' => 'text','name' => 'TechRubyVersion', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 10],$record->TechRubyVersion); ?>
						<span> <?php echo form_error('TechRubyVersion') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-4" style="margin: auto;">
						<label for="TechOther" class="control-label">Other</label>
						<?php echo form_input(['type' => 'text','name' => 'TechOther', 'class' => 'form-control',
							'autocomplete' => 'off','maxlength' => 255],$record->TechOther); ?>
						<span> <?php echo form_error('TechOther') ?> </span>
					</div>
				</div><hr>
			<div class="form-group">
				<?php echo form_submit(['value' => 'Update','class' => 'btn btn-primary']); ?>
						&nbsp;&nbsp;<?php echo anchor("home/index","View List"); ?>
			</div>
		<?php echo form_close(); ?>
	</div>

<?php include('footer.php'); ?>