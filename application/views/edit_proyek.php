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
                                <i class="shortcut-icon icon-user"></i>
								<h3>
                                    Edit User</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                   
						<div class="login-fields">
				
				<p>Edit account:</p>
				
					<?php echo form_open("proyek/update_proyek"); ?>
				<div class="field">
					<label for="firstname">Kode Proyek:</label>
					<?php echo form_input("kode_proyek",$edit_proyek[0]['kode_proyek'],'readonly');?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama">NAMA proyek:</label>
					<?php echo  form_input("nama_proyek",$edit_proyek[0]['nama_proyek']); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="start_date">Start Date:</label>
					<?php echo form_error('start_date'); ?>
					<a href="javascript:NewCssCal('start_date','yyyymmdd')"><input type="text" name="start_date" class="tgl1" id="start_date" size="20" value="<?php $edit_proyek[0]['start_date'];?>" /> 
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
					<?php echo  form_input("client",$edit_proyek[0]['client']); ?>
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
			<?php
			echo form_submit('mysubmit', 'Submit');			
			echo form_close();
			?>
			</div> <!-- .actions -->
					
			
					 <!-- /bar-chart -->
                            </div>
                            <!-- /widget-content --> 
				</div> <!-- /widget -->
									
		      </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	      
	      
	      
	      
			
	      
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
<?php include('footer.php');?>
