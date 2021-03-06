<?php include('header.php'); ?>
<style type="text/css">
	.row{
		margin-bottom: 15px;
	}
</style>
	<div class="container">
			<?php echo form_open("home/update_web/{$record->WebServerId}/{$record->FK_HostServerID}",['class' => 'form-horizontal']); ?>
				<center><h2>Edit Site</h2></center>
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
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="FK_HostServerID" class="control-label">Host Server Name</label>
						<?php
							$hosts = array();
							foreach($hostCodes as $hostCode)
							{
								$hosts[$hostCode->HostServerId]=$hostCode->HostServerName;
							}
						echo form_dropdown(['name' => 'FK_HostServerID', 'class' => 'form-control',
							'autocomplete' => 'on'],$hosts,"$record->FK_HostServerID"); ?>
						<span> <?php echo form_error('FK_HostServerID') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="WebServerName" class="control-label">Site Name</label>
						<?php echo form_input(['type' => 'text','name' => 'WebServerName', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->WebServerName); ?>
						<span> <?php echo form_error('WebServerName') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="CommonName" class="control-label">Common Name</label>
						<?php echo form_input(['type' => 'text','name' => 'CommonName', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->CommonName); ?>
						<span> <?php echo form_error('CommonName') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="Purpose" class="control-label">Purpose</label>
						<?php echo form_input(['type' => 'text','name' => 'Purpose', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->Purpose); ?>
						<span> <?php echo form_error('Purpose') ?> </span>
					</div>
				</div>	
				<div class="row">
					<div class="form-group col-md-6" style="margin: auto;">
						<label for="Description" class="control-label">Description</label>
						<?php echo form_input(['type' => 'text','name' => 'Description', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->Description); ?>
						<span> <?php echo form_error('Description') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-2" style="margin: auto;">
						<label for="CMS" class="control-label">CMS</label>
						<?php
							$CMS = array();
							foreach($CMSs as $cms)
							{
								$CMS[$cms->ListKey]=$cms->Value;
							}
						echo form_dropdown(['name' => 'CMS', 'class' => 'form-control',
							'autocomplete' => 'off'],$CMS,$record->CMS); ?>
						<span> <?php echo form_error('CMS') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="CMSVersion" class="control-label">CMS Version</label>
						<?php echo form_input(['type' => 'text','name' => 'CMSVersion', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->CMSVersion); ?>
						<span> <?php echo form_error('CMSVersion') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="CMSUsername" class="control-label">CMS Username</label>
						<?php echo form_input(['type' => 'text','name' => 'CMSUsername', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->CMSUsername); ?>
						<span> <?php echo form_error('CMSUsername') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="CMSPassword" class="control-label">CMS Password</label>
						<div class="input-group">
							<?php echo form_input(['type' => 'password','name' => 'CMSPassword', 'class' => 'form-control',
								'autocomplete' => 'off','id' => 'CMSPassword','aria-describedby' => 'basic-addon2'],$record->CMSPassword); ?>
							<span class="input-group-btn">
		        				<button class="btn btn-default" type="button" id="btnCMSPassword" onmousedown="mouseDown('btnCMSPassword','CMSPassword')" onmouseup="mouseUp('btnCMSPassword','CMSPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
		      				</span>
						</div>
						<span> <?php echo form_error('CMSPassword') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="ISPConfigClient" class="control-label">ISP Config Client</label>
						<?php echo form_input(['type' => 'text','name' => 'ISPConfigClient', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->ISPConfigClient); ?>
						<span> <?php echo form_error('ISPConfigClient') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="ISPAdminUsername" class="control-label">ISP Admin Username</label>
						<?php echo form_input(['type' => 'text','name' => 'ISPAdminUsername', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->ISPAdminUsername); ?>
						<span> <?php echo form_error('ISPAdminUsername') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="ISPAdminPassword" class="control-label">ISP Admin Password</label>
						<div class="input-group">
						<?php echo form_input(['type' => 'password','name' => 'ISPAdminPassword', 'class' => 'form-control',
							'autocomplete' => 'off','id' => 'ISPAdminPassword','aria-describedby' => 'basic-addon2'],$record->ISPAdminPassword); ?>
						<span class="input-group-btn">
	        				<button class="btn btn-default" type="button" id="eye" onmousedown="mouseDown('eye','ISPAdminPassword')" onmouseup="mouseUp('eye','ISPAdminPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
	      				</span>
						</div>
						<span> <?php echo form_error('ISPAdminPassword') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="ISPConfigClientPrefix" class="control-label">ISP Config Client Prefix</label>
						<?php echo form_input(['type' => 'text','name' => 'ISPConfigClientPrefix', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->ISPConfigClientPrefix); ?>
						<span> <?php echo form_error('ISPConfigClientPrefix') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="DatabaseName" class="control-label">Database Name</label>
						<?php echo form_input(['type' => 'text','name' => 'DatabaseName', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->DatabaseName); ?>
						<span> <?php echo form_error('DatabaseName') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="DatabaseUsername" class="control-label">Database Username</label>
						<?php echo form_input(['type' => 'text','name' => 'DatabaseUsername', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->DatabaseUsername); ?>
						<span> <?php echo form_error('DatabaseUsername') ?> </span>
					</div>
					<div class="form-group col-md-3" style="margin: auto;">
						<label for="DatabasePassword" class="control-label">Database Password</label>
						<div class="input-group">
						<?php echo form_input(['type' => 'password','name' => 'DatabasePassword', 'class' => 'form-control',
							'autocomplete' => 'off','id' => 'DatabasePassword','aria-describedby' => 'basic-addon2'],$record->DatabasePassword); ?>
						<span class="input-group-btn">
	        				<button class="btn btn-default" type="button" id="eye1" onmousedown="mouseDown('eye1','DatabasePassword')" onmouseup="mouseUp('eye1','DatabasePassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
	      				</span>
						</div>
						<span> <?php echo form_error('DatabasePassword') ?> </span>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-3" style="margin: auto;">
							<label for="AvailableExternally" class="control-label">Available Externally</label>
							<?php echo form_input(['type' => 'text','name' => 'AvailableExternally', 'class' => 'form-control',
								'autocomplete' => 'off'],$record->AvailableExternally); ?>
							<span> <?php echo form_error('AvailableExternally') ?> </span>
						</div>
						<div class="form-group col-md-3" style="margin: auto;">
							<label for="URLPrimary" class="control-label">URL Primary</label>
							<?php echo form_input(['type' => 'text','name' => 'URLPrimary', 'class' => 'form-control',
								'autocomplete' => 'off'],$record->URLPrimary); ?>
							<span> <?php echo form_error('URLPrimary') ?> </span>
						</div>
						<div class="form-group col-md-3" style="margin: auto;">
							<label for="FTPUsername" class="control-label">FTP Username</label>
							<?php echo form_input(['type' => 'text','name' => 'FTPUsername', 'class' => 'form-control',
								'autocomplete' => 'off'],$record->FTPUsername); ?>
							<span> <?php echo form_error('FTPUsername') ?> </span>
						</div>
						<div class="form-group col-md-3" style="margin: auto;">
							<label for="FTPUserPassword" class="control-label">FTP User Password</label>
							<div class="input-group">
							<?php echo form_input(['type' => 'password','name' => 'FTPUserPassword', 'class' => 'form-control',
								'autocomplete' => 'off','id' => 'FTPUserPassword','aria-describedby' => 'basic-addon2'],$record->FTPUserPassword); ?>
							<span class="input-group-btn">
		        				<button class="btn btn-default" type="button" id="eye2" onmousedown="mouseDown('eye2','FTPUserPassword')" onmouseup="mouseUp('eye2','FTPUserPassword')"><i class='glyphicon glyphicon-eye-open'></i></button>
		      				</span>
							</div>
							<span> <?php echo form_error('FTPUserPassword') ?> </span>
						</div>
				</div>
				<hr>
				<div class="row">
					<div class="form-group col-md-6" style="margin: auto;">
						<label for="Notes" class="control-label">Notes</label>
						<?php echo form_input(['type' => 'text','name' => 'Notes', 'class' => 'form-control',
							'autocomplete' => 'off'],$record->Notes); ?>
						<span> <?php echo form_error('Notes') ?> </span>
					</div>
				</div>	
				<div class="form-group">
					<?php echo form_submit(['value' => 'Update','class' => 'btn btn-primary']); ?>
					&nbsp;&nbsp;<?php echo anchor("home/view_webserver/{$record->FK_HostServerID}","View List"); ?>
				</div>
				<hr/>
			<?php echo form_close(); ?>
	</div>

<?php include('footer.php'); ?>