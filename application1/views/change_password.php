<?php include ('header.php'); ?>


<div class="account-container register">
	
	<div class="content clearfix">
		
		<form action="#" method="post">
		
			<h1>Change Your Password</h1>			
			
			<div class="login-fields">
				
				
				<?php

					echo form_open('welcome/changepwd');
					echo validation_errors();

					?>
					<table class="table table-bordered">
					<tbody>
					<tr>
					<td><small><?php echo "Old Password:";?></small></td>
					<td><?php echo form_password('opassword');?></td>

					</tr>
					<tr>
					<td><small><?php echo "New Password:";?></small></td>
					<td><?php echo form_password('npassword');?></td>

					</tr>
					<tr>
					<td><small><?php echo "Confirm Password:";?></small></td>
					<td><?php echo form_password('cpassword');?></td>

					</tr>
					</tbody>
					</table>
					<button type="submit" class="btn btn-primary" ><i class=" icon-ok-sign icon-white"></i>&nbsp;Submit</button>

					<?php

					echo form_close();

					?> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>

<script src="js/signin.js"></script>

<?php include ('footer.php'); ?>
