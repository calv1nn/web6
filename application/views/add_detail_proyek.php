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
						<h3>Add Proyek List</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					
				
				<?php echo form_open("detail_proyek/add_detail_proyek"); ?>
							
				<div class="field">
					<?php echo form_input(array('name' => 'id_pekerjaan', 'value' => '', 'type' => 'hidden' ));?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="kode_proyek">kode_proyek:</label>
					<?php echo form_input("kode_proyek", $kode_proyek,'readonly'); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama_pekerjaan">Nama Pekerjaan:</label>	
					<?php echo form_error('nama_pekerjaan'); ?>
					<?php echo form_input("nama_pekerjaan",""); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nik">Penanggung Jawab:</label>	
				<?php echo form_dropdown('nama', $dropdown);?> 
				
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
					<label for="client">progress:</label>
					<?php echo form_input("progress",""); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama">Kategori:</label>
					<?php echo form_input("kategori",""); ?>
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
	      	
	      </div> <!-- /row -->
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

<?php include('footer.php');?>
