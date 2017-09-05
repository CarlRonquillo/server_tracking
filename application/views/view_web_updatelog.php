<?php include('header.php'); ?>
	<div class="container-fluid">
		<div class="col-md-12">
			<center><h2><?php echo "Update logs of Web Server: <strong>".$record->WebServerName."</strong>"?></h2></center><hr>
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
				<div class="col-xs-2">
					<?php echo anchor("home/add_web_updatelog/{$record->WebServerId}","Add Update Logs",["class"=>"btn btn-default"]); ?>
				</div>
				<div class="col-lg-6">
					<?php echo form_open("home/search_web_log/{$record->WebServerId}",['class' => 'form-horizontal','method' => 'post']); ?>
				    	<div class="input-group">
					    	<?php echo form_input(['type' => 'text','name' => 'search','id' => 'search', 'class' => 'form-control',
										'autocomplete' => 'on', 'placeholder' => 'Search Title']); ?>
					      	<span class="input-group-btn">
					        	<?php echo form_button(['type' => 'submit','class' => 'btn btn-default','name' => 'submit','content' => "<span class='btn-label'><i class='glyphicon glyphicon-search'></i></span>"]); ?>
					      	</span>
				    	</div>
			    	<?php echo form_close(); ?>
			    </div>
			    <?php echo anchor("home/view_web_updatelogs/{$record->WebServerId}","<i class='glyphicon glyphicon-refresh'></i>",["class"=>"btn btn-default"]); ?>
	    	</div><br>
			<table class="table table-striped">
			 	<thead>
			  	<tr>
				    <th>Title</th>
				    <th>Notes</th>
				    <th>Date Created</th>
				    <th>Edit</th>
				    <th>Delete</th>
			    </tr>
			  	</thead>
			  	<tbody>
				  	<?php if(count($UpdateLogs)): ?>
				  		<?php foreach($UpdateLogs as $UpdateLog) { ?>
						    <tr>
						    	<td><?php echo $UpdateLog->Title?></td>
						    	<td><?php echo $UpdateLog->Notes?></td>
						    	<td><?php echo $UpdateLog->DateCreated?></td>
						    	<td><?php echo anchor("home/edit_web_updatelog/{$UpdateLog->ServerUpdateLogID}","<i class='glyphicon glyphicon-pencil'></i>",["class"=>"btn btn-success"]); ?></td>
						    	<td><?php echo anchor("home/delete/{$UpdateLog->ServerUpdateLogID}/serverupdatelog/ServerUpdateLogID/FK_WebServerID","<i class='glyphicon glyphicon-remove'></i>",["class"=>"btn btn-danger","onclick" => "return confirm('Are you sure you want delete?')"]); ?></td>
						    </tr>
						<?php } else: ?>
						<td>No Update Log(s) Found!</td>
					<?php endif; ?>
			  	</tbody>
			</table>
			<!--<center>
				<?php echo $links ?>
			</center>-->
		</div>
	</div>

<?php include('footer.php'); ?>