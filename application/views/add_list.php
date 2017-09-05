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
		<div class="col-md-6">
			<center><h2><?php echo $ListName; ?></h2></center>
			<hr>
			<div class="row">
				<div class="form-group col-md-4">
						<?php
							$NameLists = array();
							foreach($ListNames as $record)
							{
								$NameLists[$record->ListName]=$record->ListName;
							}
						echo form_dropdown(['name' => 'ListName','id' => 'ListName', 'class' => 'form-control',
							'autocomplete' => 'on','onchange' => "getval(this,'add_list');"],$NameLists,$ListName); ?>
						<span> <?php echo form_error('ListName') ?> </span>
				</div>
			</div>
			<?php include('list_table.php');?>
		</div>
		<div class="col-md-1"></div>
		<div style ="padding-right: 30px;" class="col-md-4">
			<?php echo form_open("home/save_list/{$ListName}",['class' => 'form-horizontal']); ?>
				<center><h2>Add List</h2></center>
				<hr>
				<div class="row">
					<div class="form-group col-md-6">
						<label for="ListName" class="control-label">List Name</label>
						<?php
							$lists = array();
							foreach($ListNames as $record)
							{
								$lists[$record->ListName]=$record->ListName;
							}
						echo form_dropdown(['name' => 'ListName', 'class' => 'form-control',
							'autocomplete' => 'on'],$lists,$ListName); ?>
						<span> <?php echo form_error('ListName') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="ListKey" class="control-label">Key</label>
						<?php echo form_input(['type' => 'text','name' => 'ListKey', 'class' => 'form-control',
							'autocomplete' => 'off',]); ?>
						<span> <?php echo form_error('ListKey') ?> </span>
					</div>
				</div>
				<div class="row">
					<div class="form-group col-md-12">
						<label for="Value" class="control-label">Value</label>
						<?php echo form_input(['type' => 'text','name' => 'Value', 'class' => 'form-control',
							'autocomplete' => 'off']); ?>
						<span> <?php echo form_error('Value') ?> </span>
					</div>
				</div>
				<div class="form-group">
					<?php echo form_checkbox('Active', '1', '1'); ?>
					<label for="Active" class="control-label">Active</label>
					<span> <?php echo form_error('Active') ?> </span>
				</div>
				<div class="form-group">
					<?php echo form_submit(['value' => 'Save','class' => 'btn btn-primary']); ?>
				</div>
				<hr/>
			<?php echo form_close(); ?>
		</div>	
	</div>

<?php include('footer.php'); ?>