<?php include('header.php'); ?>

	<div class="container">
		<div style ="width:500px;margin:auto;">
			<?php echo form_open('home/save_host',['class' => 'form-horizontal']); ?>
				<center><h2>Add Host Server</h2></center>
				<hr/>
				<?php 
					if($error = $this->session->flashdata('response')):
					{						
				?>
					<div class="alert alert-success">
						<span class ="glyphicon glyphicon-info-sign"></span>
						<?php echo $error; ?>
						<?php echo anchor("home/index","View List"); ?>
					</div>
				<?php 
					}
					endif
				?>
				<div class="form-group">
					<label for="HostServerName" class="control-label">Host Server Name</label>
					<?php echo form_input(['type' => 'text','name' => 'HostServerName', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('HostServerName'),'maxlength' => 20]); ?>
					<span> <?php echo form_error('HostServerName') ?> </span>
				</div>
				<div class="form-group">
					<label for="CommonName" class="control-label">Common Name</label>
					<?php echo form_input(['type' => 'text','name' => 'CommonName', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('CommonName'),'maxlength' => 255]); ?>
					<span> <?php echo form_error('CommonName') ?> </span>
				</div>
				<div class="form-group">
					<label for="Purpose" class="control-label">Purpose</label>
					<?php echo form_textarea(['type' => 'text','name' => 'Purpose', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('Purpose'),'maxlength' => 255]); ?>
					<span> <?php echo form_error('Purpose') ?> </span>
				</div>
				<div class="form-group">
					<label for="Description" class="control-label">Description</label>
					<?php echo form_textarea(['type' => 'text','name' => 'Description', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('Description'),'maxlength' => 255]); ?>
					<span> <?php echo form_error('Description') ?> </span>
				</div>
				<div class="form-group">
					<label for="VirtualPhysical" class="control-label">Server Type</label>
					<?php
						$serverType = array();
						foreach($VirtualPhysicals as $VirtualPhysical)
						{
							$serverType[$VirtualPhysical->ListKey]=$VirtualPhysical->Value;
						}
					echo form_dropdown(['name' => 'VirtualPhysical', 'class' => 'form-control',
						'autocomplete' => 'off'],$serverType); ?>
					<span> <?php echo form_error('VirtualPhysical') ?> </span>
				</div>
				<div class="form-group">
					<label for="VirtualHost" class="control-label">Virtual Host</label>
					<?php echo form_input(['type' => 'text','name' => 'VirtualHost', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('VirtualHost'),'maxlength' => 50]); ?>
					<span> <?php echo form_error('VirtualHost') ?> </span>
				</div>
				<div class="form-group">
					<label for="AssignedDepartment" class="control-label">Assigned Department</label>
					<?php echo form_input(['type' => 'text','name' => 'AssignedDepartment', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('AssignedDepartment'),'maxlength' => 50]); ?>
					<span> <?php echo form_error('AssignedDepartment') ?> </span>
				</div>
				<div class="form-group">
					<label for="OS" class="control-label">OS</label>
					<?php
						$_os = array();
						foreach($OSs as $os)
						{
							$_os[$os->ListKey]=$os->Value;
						}
					echo form_dropdown(['name' => 'OS', 'class' => 'form-control',
						'autocomplete' => 'off'],$_os); ?>
					<span> <?php echo form_error('OS') ?> </span>
				</div>
				<div class="form-group">
					<label for="OSVersion" class="control-label">OS Version</label>
					<?php echo form_input(['type' => 'text','name' => 'OSVersion', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('OSVersion'),'maxlength' => 20]); ?>
					<span> <?php echo form_error('OSVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="IPv4AddressInternal" class="control-label">IPv4 Address Internal</label>
					<?php echo form_input(['type' => 'text','name' => 'IPv4AddressInternal', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('IPv4AddressInternal'),'maxlength' => 15]); ?>
					<span> <?php echo form_error('IPv4AddressInternal') ?> </span>
				</div>
				<div class="form-group">
					<label for="IPV4AddressExternal" class="control-label">IPv4 Address External</label>
					<?php echo form_input(['type' => 'text','name' => 'IPV4AddressExternal', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('IPv4AddressExternal'),'maxlength' => 15]); ?>
					<span> <?php echo form_error('IPV4AddressExternal') ?> </span>
				</div>
				<div class="form-group">
					<label for="PortsOpen" class="control-label">Ports Open</label>
					<?php echo form_input(['type' => 'text','name' => 'PortsOpen', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('PortsOpen'),'maxlength' => 255]); ?>
					<span> <?php echo form_error('PortsOpen') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigInstalled" class="control-label">Server Type</label>
					<?php
						$ISPConfigInstalled = array();
						foreach($ISPConfigInstalleds as $_ISPConfigInstalled)
						{
							$ISPConfigInstalled[$_ISPConfigInstalled->ListKey]=$_ISPConfigInstalled->Value;
						}
					echo form_dropdown(['name' => 'ISPConfigInstalled', 'class' => 'form-control',
						'autocomplete' => 'off'],$ISPConfigInstalled); ?>
					<span> <?php echo form_error('ISPConfigInstalled') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigVersion" class="control-label">ISP Config Version</label>
					<?php echo form_input(['type' => 'text','name' => 'ISPConfigVersion', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('ISPConfigVersion'),'maxlength' => 10]); ?>
					<span> <?php echo form_error('ISPConfigVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigAdminUsername" class="control-label">ISP Config Admin Username</label>
					<?php echo form_input(['type' => 'text','name' => 'ISPConfigAdminUsername', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('ISPConfigAdminUsername'),'maxlength' => 20]); ?>
					<span> <?php echo form_error('ISPConfigAdminUsername') ?> </span>
				</div>
				<div class="form-group">
					<label for="ISPConfigAdminPassword" class="control-label">ISP Config Admin Password</label>
					<div class="input-group">
					<?php echo form_input(['type' => 'password','name' => 'ISPConfigAdminPassword', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255,'aria-describedby' => 'basic-addon2','id' => 'ISPConfigAdminPassword']); ?>
					<span class="input-group-btn">
        				<button class="btn btn-default" type="button" id="eye" onmousedown="mouseDown('eye','ISPConfigAdminPassword')" onmouseup="mouseUp('eye','ISPConfigAdminPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
      				</span>
					</div>
					<span> <?php echo form_error('ISPConfigAdminPassword') ?> </span>
				</div>
				<div class="form-group">
					<label for="Database" class="control-label">Database</label>
					<?php
						$database = array();
						foreach($Databases as $Database)
						{
							$database[$Database->ListKey]=$Database->Value;
						}
					echo form_dropdown(['name' => 'Database', 'class' => 'form-control',
						'autocomplete' => 'off'],$database); ?>
					<span> <?php echo form_error('Database') ?> </span>
				</div>
				<div class="form-group">
					<label for="DatabaseVersion" class="control-label">Database Version</label>
					<?php echo form_input(['type' => 'text','name' => 'DatabaseVersion', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('DatabaseVersion'),'maxlength' => 10]); ?>
					<span> <?php echo form_error('DatabaseVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="MailEnabled" class="control-label">Mail Enabled</label>
					<?php
						$MailEnabled = array();
						foreach($MailEnableds as $_MailEnabled)
						{
							$MailEnabled[$_MailEnabled->ListKey]=$_MailEnabled->Value;
						}
					echo form_dropdown(['name' => 'MailEnabled', 'class' => 'form-control',
						'autocomplete' => 'off'],$MailEnabled); ?>
					<span> <?php echo form_error('MailEnabled') ?> </span>
				</div>
				<div class="form-group">
					<label for="SUUserName" class="control-label">SU Username</label>
					<?php echo form_input(['type' => 'text','name' => 'SUUserName', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('SUUserName'),'maxlength' => 15]); ?>
					<span> <?php echo form_error('SUUserName') ?> </span>
				</div>
				<div class="form-group">
					<label for="SUPassword" class="control-label">SU Password</label>
					<div class="input-group">
					<?php echo form_input(['type' => 'password','name' => 'SUPassword', 'class' => 'form-control',
						'autocomplete' => 'off','maxlength' => 255,'aria-describedby' => 'basic-addon2','id' => 'SUPassword']); ?>
					<span class="input-group-btn">
        				<button class="btn btn-default" type="button" id="eye2" onmousedown="mouseDown('eye2','SUPassword')" onmouseup="mouseUp('eye2','SUPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
      				</span>
      				</div>
					<span> <?php echo form_error('SUPassword') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechWebserver" class="control-label">Tech Webserver</label>
					<?php echo form_input(['type' => 'text','name' => 'TechWebserver', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechWebserver'),'maxlength' => 1]); ?>
					<span> <?php echo form_error('TechWebserver') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechWebserverType" class="control-label">Tech Webserver Type</label>
					<?php
						$TechWebserver = array();
						foreach($TechWebserverTypes as $TechWebserverType)
						{
							$TechWebserver[$TechWebserverType->ListKey]=$TechWebserverType->Value;
						}
					echo form_dropdown(['name' => 'TechWebserverType', 'class' => 'form-control',
						'autocomplete' => 'off'],$TechWebserver); ?>
					<span> <?php echo form_error('TechWebserverType') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechJava" class="control-label">Tech Java</label>
					<?php echo form_input(['type' => 'text','name' => 'TechJava', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechJava'),'maxlength' => 1]); ?>
					<span> <?php echo form_error('TechJava') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechJavaVersion" class="control-label">Tech Java Version</label>
					<?php echo form_input(['type' => 'text','name' => 'TechJavaVersion', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechJavaVersion'),'maxlength' => 10]); ?>
					<span> <?php echo form_error('TechJavaVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechPHP" class="control-label">Tech PHP</label>
					<?php echo form_input(['type' => 'text','name' => 'TechPHP', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechPHP'),'maxlength' => 1]); ?>
					<span> <?php echo form_error('TechPHP') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechPHPVersion" class="control-label">Tech PHP Version</label>
					<?php echo form_input(['type' => 'text','name' => 'TechPHPVersion', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechPHPVersion'),'maxlength' => 10]); ?>
					<span> <?php echo form_error('TechPHPVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechRuby" class="control-label">Tech Ruby</label>
					<?php echo form_input(['type' => 'text','name' => 'TechRuby', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechRuby'),'maxlength' => 1]); ?>
					<span> <?php echo form_error('TechRuby') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechRubyVersion" class="control-label">Tech Ruby Version</label>
					<?php echo form_input(['type' => 'text','name' => 'TechRubyVersion', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechRubyVersion'),'maxlength' => 10]); ?>
					<span> <?php echo form_error('TechRubyVersion') ?> </span>
				</div>
				<div class="form-group">
					<label for="TechOther" class="control-label">Tech Other</label>
					<?php echo form_input(['type' => 'text','name' => 'TechOther', 'class' => 'form-control',
						'autocomplete' => 'off', 'value' => set_value('TechOther'),'maxlength' => 255]); ?>
					<span> <?php echo form_error('TechOther') ?> </span>
				</div>
				<hr>
				<div class="form-group">
					<?php echo form_submit(['value' => 'Save','class' => 'btn btn-primary']); ?>
					&nbsp;&nbsp; <?php echo anchor("home/index","View List"); ?>
				</div>
			<?php echo form_close(); ?>
		</div>		
	</div>

<?php include('footer.php'); ?>