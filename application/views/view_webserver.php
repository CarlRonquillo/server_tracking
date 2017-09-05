<?php include('header.php'); ?>
	<div class="container-fluid">
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
		<div class="col-md-12">
			<center><h2><?php echo "Web Servers of Host Server: <strong>".$record->HostServerName."</strong>"?></h2></center><hr>
			<div class="row">
				<div class="col-xs-2">
					<?php echo anchor("home/add_web/{$record->HostServerId}","Add Web Server",["class"=>"btn btn-default"]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo form_open("home/search_web/{$record->HostServerId}",['class' => 'form-horizontal','method' => 'post']); ?>
				    	<div class="input-group">
					    	<?php echo form_input(['type' => 'text','name' => 'search','id' => 'search', 'class' => 'form-control',
										'autocomplete' => 'on', 'placeholder' => 'Search Web Server Name']); ?>
					      	<span class="input-group-btn">
					        	<?php echo form_button(['type' => 'submit','class' => 'btn btn-default','name' => 'submit','content' => "<span class='btn-label'><i class='glyphicon glyphicon-search'></i></span>"]); ?>
					      	</span>
				    	</div>
			    	<?php echo form_close(); ?>
			    </div>
			    <?php echo anchor("home/view_webserver/{$record->HostServerId}","<i class='glyphicon glyphicon-refresh'></i>",["class"=>"btn btn-default"]); ?>
	    	</div><br>
			<table class="table table-striped">
			 	<thead>
			  	<tr>
				    <th>Web Server Name</th>
				    <th>Common Name</th>
				    <th>Update Log</th>
				    <th>Other Users</th>
				    <th>Delete</th>
			    </tr>
			  	</thead>
			  	<tbody>
				  	<?php if(count($webservers)): ?>
				  		<?php foreach($webservers as $webserver) { ?>
						    <tr>
						    <?php
						   	$this->load->model('CrudModel');
						   	$logsCount = $this->CrudModel->count_records($webserver->WebServerId,'FK_WebServerID','serverupdatelog');
						   	$usersCount = $this->CrudModel->count_records($webserver->WebServerId,'FK_WebServerID','otherusers');
					   		?>
						    	<td><?php echo anchor("home/edit_web/{$webserver->WebServerId}",$webserver->WebServerName) ?></td>
						    	<td><?php echo $webserver->CommonName; ?></td>
						    	<td><?php echo anchor("home/view_web_updatelogs/{$webserver->WebServerId}","{$logsCount} <i class='glyphicon glyphicon-file'></i>",["class"=>"btn btn-default"]); ?></td>
						    	<td><?php echo anchor("home/view_web_users/{$webserver->WebServerId}","{$usersCount} <i class='glyphicon glyphicon-user'></i>",["class"=>"btn btn-default"]); ?></td>
						    	<td><?php echo anchor("home/delete/{$webserver->WebServerId}/webserver/WebServerId/FK_HostServerID","<i class='glyphicon glyphicon-remove'></i>",["class"=>"btn btn-danger","onclick" => "return confirm('Are you sure you want delete?')"]); ?></td>
						    </tr>
						<?php } else: ?>
						<td>No WebServer(s) Found!</td>
					<?php endif; ?>
			  	</tbody>
			</table>
			<!--<center>
				<?php echo $links ?>
			</center>-->
		</div>
	</div>

<?php include('footer.php'); ?>