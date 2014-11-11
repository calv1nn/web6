<?php include('header.php'); ?>
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
				<?php	
				$jabatan = array(
              ''  => 'Choose option...',
              'Bussiness Project Manager'  => 'Bussiness Project Manager',
              'Project Manager'    => 'Project Manager',
              'Tim Teknis' => 'Tim Teknis'
            );
			?>
					<?php echo form_open("user/update_karyawan"); ?>
				<div class="field">
					<label for="firstname">NIK:</label>
					<?php echo form_input("nik",$edit_karyawan[0]['nik'],'readonly');?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="email">EMAIL:</label>	
					<?php echo form_input("email",$edit_karyawan[0]['email']); ?>
				</div> <!-- /field -->
				
				
				<div class="field">
					<label for="nama">NAMA KARYAWAN:</label>
					<?php echo  form_input("nama_karyawan",$edit_karyawan[0]['nama_karyawan']); ?>
				</div> <!-- /field -->
				
				
				<div class="field">
					<label for="nama">JABATAN:</label>
					<?php echo  form_input("jabatan",$edit_karyawan[0]['jabatan']); ?>

				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama">STATUS:</label>
					<?php echo form_radio('status', '1', TRUE); ?><?php echo form_label('Aktif', 'status');?> 
					<?php echo form_radio('status', '0', FALSE); ?><?php echo form_label('Tidak Aktif', 'status');?>
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
