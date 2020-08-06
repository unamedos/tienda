<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/plugins/jquery-toast-plugin/dist/jquery.toast.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() 
	{
		"use strict";

		<?php 

			if($this->session->flashdata('success'))
			{ 
				?>
	        		$.toast({
			            heading: '¡EXCELENTE!',
						text: '<?php echo $this->session->flashdata('success'); ?>',
						position: 'top-right',
						loaderBg:'#7a5449',
						class: 'jq-has-icon jq-icon-success',
						hideAfter: 3500, 
						stack: 6,
						showHideTransition: 'fade'
			        });
	    		<?php

	    	}else if($this->session->flashdata('warning')){  

	    		?>
	        		$.toast({
						heading: '¡ERROR!',
						text: '<?php echo $this->session->flashdata('warning'); ?>',
						position: 'top-right',
						loaderBg:'#7a5449',
						class: 'jq-has-icon jq-icon-warning',
						hideAfter: 3500, 
						stack: 6,
						showHideTransition: 'fade'
					});
	    		<?php

	    	}else if($this->session->flashdata('info')){  

	    		?>
	        		$.toast({
	        			heading: '¡INFO!',
			            text: '<?php echo $this->session->flashdata('info'); ?>',
						position: 'top-right',
						loaderBg:'#7a5449',
						class: 'jq-has-icon jq-icon-info',
						hideAfter: 3500, 
						stack: 6,
						showHideTransition: 'fade'
			        });
	    		<?php 
	    	} 
	    ?>
	});
       
</script>