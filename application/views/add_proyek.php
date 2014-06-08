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
						<h3>Add New Project</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
				
				<?php echo form_open("proyek/add_proyek"); ?>
							
				<div class="field">
					<?php echo form_input(array('name' => 'kode_proyek', 'value' => '', 'type' => 'hidden' ));?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama_proyek">Nama Proyek:</label>	
					<?php echo form_error('nama_proyek'); ?>
					<?php echo form_input("nama_proyek",""); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="start_date">Start Date:</label>
					<?php echo form_error('start_date'); ?>
					<a href="javascript:NewCssCal('start_date','yyyymmdd')"><input type="text" name="start_date" class="tgl1" id="start_date" size="20" /> 
					<img src="<?php echo base_url(); ?>assets/datepicker/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />
					</a>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="end_date">End Date:</label>
					<?php echo form_error('end_date'); ?>
					<a href="javascript:NewCssCal('end_date','yyyymmdd')"><input type="text" name="end_date" class="tgl1" id="end_date" size="20" /> 
					<img src="<?php echo base_url(); ?>assets/datepicker/images/cal.gif" width="16" height="16" alt="Pilih tanggal" />
					</a>
				</div> 
				
				<div class="field">
					<label for="client">CLIENT:</label>
					<?php echo form_error('client'); ?>
					<?php echo form_input("client",""); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama">STATUS:</label>
					<?php echo form_input("status",""); ?>
				</div> <!-- /field -->
				<?php
			echo form_submit('mysubmit', 'ADD');
			echo form_close();	
			?>
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
			
			
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
				
	      		
	      		
	      		
		    </div> <!-- /span6 -->
	      	
	      	
	      	<div class="span6">
	      		
	      		<div class="widget">
							
					<div class="widget-header">
						<i class="icon-list-alt"></i>
						<h3>Another Chart</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
						<canvas id="bar-chart" class="chart-holder" height="250" width="538"></canvas>
					</div> <!-- /widget-content -->
				
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	      
	      
	      
	      
			
	      
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

<?php include('footer.php');?>
