<?php include('header.php'); ?>

<div class="container">

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
	  	 <div class="col-xs-3">
		  	<?php echo anchor("home/add_host","Add Host Sever",["class"=>"btn btn-default"]); ?>
			<?php echo anchor("home/add_web/1","Add Web Server",["class"=>"btn btn-default"]); ?>
	 	</div>
  		<div class="col-lg-6">
  		<?php echo form_open('home/search',['class' => 'form-horizontal','method' => 'post']); ?>
	    	<div class="input-group">
		    	<?php echo form_input(['type' => 'text','name' => 'search','id' => 'search', 'class' => 'form-control',
							'autocomplete' => 'on', 'placeholder' => 'Search Host Name...']); ?>
		      	<span class="input-group-btn">
		        	<?php echo form_button(['type' => 'submit','class' => 'btn btn-default','name' => 'submit','content' => "<span class='btn-label'><i class='glyphicon glyphicon-search'></i></span>"]); ?>
		      	</span>
	    	</div>
	    <?php echo form_close(); ?>
  		</div>
  		<?php echo anchor("home/index","<i class='glyphicon glyphicon-refresh'></i>",["class"=>"btn btn-default"]); ?>
	</div><br>
	<div class="row">
	<table class="table table-striped">
	  <thead>
	  	<tr>
	      <th>Host Server Name</th>
	      <th>Common Name</th>
	      <th>Internal IP</th>
	      <th>External IP</th>
	      <th>Ports Open</th>
	      <th>Web Server</th>
	      <th>Update Log</th>
	      <th>Other Users</th>
	      <th>Delete</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php if(count($records)): ?>
	  		<?php foreach($records as $record) { ?>
			    <tr>
			    	<td><?php echo anchor("home/edit_host/{$record->HostServerId}",$record->HostServerName);?></td>
			    	<td><?php echo $record->CommonName?></td>
			    	<td><?php echo $record->IPv4AddressInternal?></td>
			    	<td><?php echo $record->IPV4AddressExternal?></td>
			   		<td><?php echo $record->PortsOpen?></td>
			   		<?php
			   			$this->load->model('CrudModel');
			   			$webcount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','webserver');
						$logsCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','serverupdatelog');
						$usersCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','otherusers');
			   		?>
			   		<td><?php echo anchor("home/view_webserver/{$record->HostServerId}","{$webcount} <i class='glyphicon glyphicon-hdd'></i>",["class"=>"btn btn-default"]); ?></td>
			    	<td><?php echo anchor("home/view_updatelogs/{$record->HostServerId}","{$logsCount} <i class='glyphicon glyphicon-file'></i>",["class"=>"btn btn-default"]); ?></td>
			    	<td><?php echo anchor("home/view_users/{$record->HostServerId}","{$usersCount} <i class='glyphicon glyphicon-user'></i>",["class"=>"btn btn-default"]); ?></td>
			    	<td><div class="btn-group">
			    	<?php if($webcount >= 1)
			    				{
			    					$url = "";
			    					$attributes = array("disabled" => "yes","class"=>"btn btn-danger",'role' =>"button");
			    				}
			    				else
			    				{
			    					$url = "home/delete/{$record->HostServerId}/hostserver/HostServerId/";
			    					$attributes = array("class"=>"btn btn-danger","onclick" => "return confirm('Are you sure you want delete?')",'role' =>"button");
			    				}
			    		$data = array(
							        'name'          => 'button',
							        'id'            => 'button',
							        'onclick'       => "return confirm('Are you sure you want delete?')",
							        'class'         => 'btn btn-danger',
							        'content'       => "<a href='home/delete/{$record->HostServerId}/hostserver/HostServerId/' class=''><i class='glyphicon glyphicon-remove'></i></a>",
							        'disabled' => 'yes'
							);
			    		//echo form_button($data);
			    		echo anchor($url,"<i class='glyphicon glyphicon-remove'></i>",$attributes); ?></td></div>
			    </tr>
			<?php } else: ?>
			<tr>No Records Found!</tr>
		<?php endif; ?>
	  </tbody>
	</table>
	<center>
		<?php echo $links ?>
	</center>
	</div>
</div>

<?php include('footer.php'); ?>