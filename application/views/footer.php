	<script type = "text/js" src="<?php echo base_url("resources/js/bootstrap.js"); ?>"></script>
	<script type = "text/js" src="<?php echo base_url("resources/js/bootstrap.min.js"); ?>"></script>
	<script type = "text/js" src="<?php echo base_url("resources/js/npm.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("resources/js/server_script.js"); ?>"></script>

	<script type="text/javascript" src="<?php echo base_url("resources/js/jQuery.bdt.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("resources/js/jquery.bdt.min.js"); ?>"></script>

	<script>
	    $(document).ready( function () {
	        $('#host_table').bdt({
	            showSearchForm: 0,
	            showEntriesPerPageField: 0
	        });
	    });

		function ISP_Config_showHide() {
			var element = document.getElementById("ISPConfigInstalled");
			var check_value = element.options[element.selectedIndex].value;
		    var x = document.getElementById('ISP_Config');
			if(check_value == 'N')
		    {
		        x.style.display = 'none';
		        $('#ISP_Config').find('input').val('');
		    }
		    else
		    {
		    	x.style.display = 'block';
		    }
		}
	</script>
</body>
</html>