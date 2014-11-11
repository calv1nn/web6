<?php include ('header.php'); ?>


<div class="account-container register">
	
	<div class="content clearfix">
		
		
			<h1>Reset Password</h1>			
			
			<div class="login-fields">
				
					
					<?php echo form_open("user/update_password"); ?>
					<table class="table table-bordered">
					<tbody>
					
					<div class="field">
					<label for="firstname">NIK:</label>
					<?php echo form_input("nik",$edit_password[0]['nik'],'readonly');?>
					</div> <!-- /field -->
					
					<tr>
					<div class="field">
					<label for="password">Password:</label>
					<?php echo form_input(array('name' => 'password','type' => 'password', 'value' => '')); ?>
					</div> <!-- /field -->

					</tr>
					<div class="field">
					<label for="passconf">Confirm Password:</label>
					<?php echo form_input(array('name' => 'passconf','type' => 'password', 'value' => '')); ?>
					</div> 
					</tr>
					</tbody>
					</table>
						<?php
			echo form_submit('mysubmit', 'Submit');			
			echo form_close();
			?>
		
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

<?php include ('footer.php'); ?>
