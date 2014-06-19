<!DOCTYPE html>
<?php $this->session->sess_destroy(); ?>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Login - Sistem Informasi Pengelolaan Proyek</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css">
<!--login-->
<link href="<?php echo base_url(); ?>assets/css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Sistem Informasi Pengelolaan Proyek				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						
					</li>
					
					<li class="">						
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
		
		
			<h1>Member Login</h1>		
			
			<div class="login-fields">
				
				<p>Please provide your details</p>
				<?php 
				echo form_open("welcome/check_login");
				?>	
				<div class="field">
					<label for="email">Email</label>
					<?php echo form_input("email","",'class="login username-field" placeholder="Email"'); ?>
				</div> <!-- /field -->
				
				<div class="field">
					<label for="password">Password:</label>
					<?php echo form_password("password","",'class="login password-field" placeholder="Password" '); ?>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
			<?php
				echo form_submit('mysubmit', 'Sign In','class="button btn btn-success btn-large"');
				echo form_close();
			?>
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->



<div class="login-extra">
	<a href="#">Reset Password</a>
</div> <!-- /login-extra -->


<script src="<?php echo base_url(); ?>assets/jquery-1.7.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/js/signin.js"></script>

</body>

</html>
