<?php include('header.php'); ?>
 
<link href="<?php echo base_url(); ?>assets/datepicker/rfnet.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/datepicker/datetimepicker_css.js"></script>

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	    	
	     <div class="row">
	      	
	      	<div class="span12">
	      
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>UPLOAD FILE</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
				<?php echo form_open_multipart('detail_proyek/do_upload'); ?>
				
				<div class="field">
					<?php echo form_input("id_pekerjaan", $id_pekerjaan,'readonly'); ?>
				</div> <!-- /field -->
				
				<input type="file" name="file_upload" />
				<input type="submit" name="upload" value="upload" />
				<?php echo form_close(); ?>
							
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
		    </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

<?php include('footer.php');?>
