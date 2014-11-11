<?php include('header.php'); ?>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/zebra-datepicker/public/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/zebra-datepicker/public/javascript/zebra_datepicker.js"></script>

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	    	
	     <div class="row">
	      	
	      	<div class="span12">
	      
	     
               
                        <div class="widget">
                            <div class="widget-header">
                                <i class="shortcut-icon icon-user"></i>
								<h3>
                                    Edit Proyek</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                   
						<div class="login-fields">
				
				
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
					<?php echo form_input("start_date",$edit_proyek[0]['start_date'],"class='datepicker-start'"); ?>
				
				</div> <!-- /field -->

				<div class="field">
					<label for="end_date">End Date:</label>
					<?php echo form_error('end_date'); ?>
					<?php echo form_input("end_date",$edit_proyek[0]['end_date'],"class='datepicker-end'"); ?>
				
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
    
	<script>
$('.datepicker-start').Zebra_DatePicker({
  direction: true,
  pair: $('.datepicker-end')
});

$('.datepicker-end').Zebra_DatePicker({
  direction: 1
});
</script>
	
<?php include('footer.php');?>
