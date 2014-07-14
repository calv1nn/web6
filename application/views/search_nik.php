<?php include('header.php'); ?>
  
<style>
.thumbnail 
{
float:right;
font-size:100%;
padding:13px 30px;
color:white;
background-color: grey; 
}

</style>


  
<div class="main">
	
	<div class="main-inner">

	    <div class="container">
			
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>Add User</h3> 
					</div> <!-- /widget-header -->
					<div class="widget-content">

					<?php
						foreach($results as $row){
					?>
					
					<?php echo form_open("user/add_karyawan1"); ?>
					<div class="field">
					<label for="firstname">NIK:</label>
						<?php echo form_input("nik",$row->nik,'readonly') ?>
						<?php echo form_error('nik');?>
					</div> <!-- /field -->
					
					<div class="field">
					<label for="firstname">Nama:</label>
						<?php echo form_input("nama_karyawan",$row->nama) ?></td>
						<?php echo form_error('nama_karyawan');?>
					</div> <!-- /field -->
					
					<div class="field">
					<label for="firstname">Email:</label>
					<td><?php echo form_input("email",set_value('email')) ?>
					<?php echo form_error('email');?>
					</div> <!-- /field -->
					
					<div class="field">
					<label for="firstname">Password:</label>
					<?php echo form_input(array('name' => 'password','type' => 'password', 'value' => '')); ?>
					<?php echo form_error('password');?>
					</div> <!-- /field -->
					
					<div class="field">
					<label for="passconf">Confirm Password:</label>
					<?php echo form_input(array('name' => 'passconf','type' => 'password', 'value' => '')); ?>
					<?php echo form_error('passconf');?>
					</div> 
					
					<div class="field">
					<label for="nama">JABATAN:</label>
					<?php echo form_input('jabatan',$row->jabatan); ?>
					</div> <!-- /field -->
					
					<div class="field">
					<label for="nama">STATUS:</label>
					<?php echo form_radio('status', '1', TRUE); ?><?php echo form_label('Aktif', 'status');?> 
					<?php echo form_radio('status', '0', FALSE); ?><?php echo form_label('Tidak Aktif', 'status');?>
					</div> <!-- /field -->
					
					<div class="login-actions">
					<?php
					echo form_submit('mysubmit', 'ADD');
					echo form_close();	
					?>
					</div> <!-- .actions -->
					
					<?php
						}
						?>
						<div class="container">
					</div>
					</div>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    


<?php include('footer.php'); ?>