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
                                    Add User</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                   
						<div class="login-fields">
				
				<p>Add account:</p>
				
			<?php	
				$jabatan = array(
              ''  => 'Choose option...',
              'Bussiness Project Manager'  => 'Bussiness Project Manager',
              'Project Manager'    => 'Project Manager',
              'Tim Teknis' => 'Tim Teknis'
            );
			?>
				<?php echo validation_errors(); ?>
				<?php echo form_open("user/add_karyawan"); ?>
							
				<div class="field">
					<label for="firstname">NIK:</label>
					<?php echo form_input(array('name' => 'nik', 'value' => '', 'maxlength' => '4'));?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="email">EMAIL:</label>	
					<?php echo form_input("email",""); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<?php echo form_input(array('name' => 'password','type' => 'password', 'value' => '')); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="passconf">Confirm Password:</label>
					<?php echo form_input(array('name' => 'passconf','type' => 'password', 'value' => '')); ?>
				</div> 
				
				<div class="field">
					<label for="nama">NAMA KARYAWAN:</label>
					<?php echo form_input("nama_karyawan",""); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama">JABATAN:</label>
					<?php echo form_dropdown('jabatan',  $jabatan); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="nama">STATUS:</label>
					<?php echo form_radio('status', 'Active', TRUE); ?><?php echo form_label('Aktif', 'status');?> 
					<?php echo form_radio('status', 'Inactive', FALSE); ?><?php echo form_label('Tidak Aktif', 'status');?>
				</div> <!-- /field -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
			<?php
			echo form_submit('mysubmit', 'ADD');
			echo form_close();	
			?>
			</div> <!-- .actions -->
					
					
               
             </div>
               
               
         </div>
         </div>      
	      	
	  	  <!-- /row -->
	
	      
	      		
	      		
	      		
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
