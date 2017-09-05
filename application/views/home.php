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
			<?php echo anchor("home/add_web/1","Add Site",["class"=>"btn btn-default"]); ?>
	 	</div>
  		<div class="col-lg-6">
	  		<div class="col-lg-11">
				<?php echo form_open('home/search',['class' => 'form-horizontal','method' => 'post' , 'id' => 'form_search']); ?>
			    	<div class="input-group">
				    	<?php echo form_input(['type' => 'text','name' => 'searchBar','id' => 'searchBar', 'class' => 'form-control',
									'autocomplete' => 'on', 'placeholder' => 'Search Host Name, Common Name or Purpose']); ?>
				      	<span class="input-group-btn">
				        	<?php echo form_button(['type' => 'submit','class' => 'btn btn-default','name' => 'submit','content' => "<span class='btn-label'><i class='glyphicon glyphicon-search'></i></span>"]); ?>
				      	</span>
			    	</div>
	  		</div>
	  		<div class="col-lg-1">
	    		<?php echo anchor("home/index","<i class='glyphicon glyphicon-refresh'></i>",["class"=>"btn btn-default"]); ?>
	  		</div>
  		</div>
  		<div class="col-xs-2">
	 		<div class="form-group">
				<label for="ShowAll" class="control-label">
					<?php echo form_checkbox(['name' => 'ShowAll','value' => $showAll, 'checked' => $showAll, 'id' => 'ShowAll', 'onChange' => 'show_all()']); ?> Show All</label>
				<span> <?php echo form_error('TechWebserver') ?> </span>
			</div>
	 	</div>
	 			<?php echo form_close(); ?>
	</div><br>
	<div class="row">
		<table class="table table-striped table-hover" id="host_table">
			<thead>
		  	<tr>
		      <th>Host Server Name</th>
		      <th>Common Name</th>
		      <th>Purpose</th>
		      <th>ISP Config</th>
		      <th>Internal IP</th>
		      <th>External IP</th>
		      <th>Site</th>
		      <!--<th>Update Log</th>
		      <th>Other Users</th>-->
		      <th>Delete</th>
		    </tr>
			</thead>
			<tbody>
		  	<?php if(count($records)): ?>
		  		<?php foreach($records as $record) {
		  				$row_class = ""; 
		  				if($record->ActiveStatus != 'Active') {
		  					$row_class = "info";
		  				}?>
				    <tr class=<?php echo "{$row_class}"; ?> >
				    	<td><?php echo anchor("home/edit_host/{$record->HostServerId}",$record->HostServerName);?></td>
				    	<td><?php echo $record->CommonName?></td>
				    	<td><?php echo $record->Purpose?></td>
				    	<td><?php echo $record->ISPConfigInstalled?></td>
				    	<td><?php echo $record->IPv4AddressInternal?></td>
				    	<td><?php echo $record->IPV4AddressExternal?></td>
				   		<?php
				   			$this->load->model('CrudModel');
				   			$webcount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','webserver');
							$logsCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','serverupdatelog');
							$usersCount = $this->CrudModel->count_records($record->HostServerId,'FK_HostServerID','otherusers');
				   		?>
				   		<td><?php echo anchor("home/view_webserver/{$record->HostServerId}","{$webcount} <i class='glyphicon glyphicon-hdd'></i>",["class"=>"btn btn-default"]); ?></td>
				    	<!--<td><?php echo anchor("home/view_updatelogs/{$record->HostServerId}","{$logsCount} <i class='glyphicon glyphicon-file'></i>",["class"=>"btn btn-default"]); ?></td>
				    	<td><?php echo anchor("home/view_users/{$record->HostServerId}","{$usersCount} <i class='glyphicon glyphicon-user'></i>",["class"=>"btn btn-default"]); ?></td> -->
				    	<td><div class="btn-group">
				    	<?php if($webcount >= 1)
				    				{
				    					$url = "#";
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

<script type="text/javascript">	
	function show_all() {
	    var checkbox_value = document.getElementById("ShowAll").checked;
	    var base_url = "<?php echo base_url(); ?>";
	    if(checkbox_value)
	    {
	    	var method = 'show_all';
	    }
	    else
	    {
	    	var method = 'index';
	    }
	    location.replace(base_url + 'index.php/home/' + method);
	}
</script>

<?php include('footer.php'); ?>