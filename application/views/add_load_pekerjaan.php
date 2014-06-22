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
						<h3>Add Pekerja</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
				
					<table border="5" style="width:100px">
						<?php echo form_open("load_pekerjaan/add_load_pekerjaan"); ?>
									
						<div class="field">
							<?php echo form_hidden("kode_proyek", $kode_proyek,'readonly'); ?>
						</div> <!-- /field -->
						
						<?php foreach ($checkbox as $row2){  $i = 0; ?>
						<tr>
							<td><?php echo form_checkbox('nik[]',$row2['nik']);  ?></td> 
							<td><?php echo $row2['nama_karyawan']; ?></td> 
							<?php foreach ($getload as $row){ ?>
								<?php if ($row['nik'] == $row2['nik']) { $i++; }?>
									
									
							<?php } ?>
							<td><?php echo $i; ?></td>
						</tr>
						<?php }?>
					<tr>	<?php
					echo form_submit('mysubmit', 'ADD');
					echo form_close();	
					?>
					</tr>
					</div> <!-- /login-fields -->
					</table>
			<div class="login-actions">
			
			
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
		    </div> <!-- /span6 -->
	      	
	      </div> <!-- /row -->
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

<?php include('footer.php');?>
