			<table class="table table-striped">
			 	<thead>
			  	<tr>
				    <th>Key</th>
				    <th>Value</th>
				    <th>Edit</th>
			    </tr>
			  	</thead>
			  	<tbody>
				  	<?php if(count($lists)): ?>
				  		<?php foreach($lists as $list) { ?>
						    <tr>
						    	<td><?php echo $list->ListKey ?></td>
						    	<td><?php echo $list->Value ?></td>
						    	<td><?php echo anchor("home/view_lists/{$list->ListName}/{$list->ListID}","<i class='glyphicon glyphicon-pencil'></i>",["class"=>"btn btn-success"]); ?></td>
						    	<!--<td><?php echo anchor("home/delete/{$list->ListID}/lists/ListID/","<i class='glyphicon glyphicon-remove'></i>",["class"=>"btn btn-danger","onclick" => "return confirm('Are you sure you want delete?')"]); ?></td>-->
						    </tr>
						<?php } else: ?>
						<td>No record(s) Found!</td>
					<?php endif; ?>
			  	</tbody>
			</table>
			<!--<center>
				<?php echo $links ?>
			</center>-->

<script type="text/javascript">	
	function getval(sel,add_view)
	{
		var base_url = "<?php echo base_url(); ?>"
	   	location.replace(base_url + 'index.php/home/' + add_view + '/' + sel.value + '/0');
	}
</script>