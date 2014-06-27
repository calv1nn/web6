<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Sistem Informasi</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="<?php echo base_url(); ?>assets/apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/pages/dashboard.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style3.css" type="text/css" />
<!--reports -->
<link href="<?php echo base_url(); ?>assets/css/pages/reports.css" rel="stylesheet">

<!--documents -->
<link href="<?php echo base_url(); ?>assets/js/guidely/guidely.css" rel="stylesheet"> 

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<?php
	$q=$this->session->userdata('login_valid',TRUE);
	if ($q=="")
	{
		echo"<script>
		redirect('welcome/login');
		</script>";
	}
?>

<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="welcome/index">Sistem Informasi </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i>  <?php echo $this->session->userdata('email'); ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo base_url();?>welcome/changepwd">Change Password</a></li>
              <li><a href="<?php echo base_url();?>welcome/logout">Logout</a></li>
            </ul>
          </li>
        </ul>
		
		</div>
		
       <!--  <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form> -->
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="<?php echo base_url(); ?>"><i class="icon-home "></i><span>Dashboard</span> </a> </li>
        <li><a href="<?php echo base_url(); ?>proyek/index"><i class="icon-list-alt"></i><span>Proyek</span> </a> </li>
        <li><a href="<?php echo base_url(); ?>diskusi"><i class="icon-th-large"></i><span>Diskusi</span> </a></li>
        <li><a href="<?php echo base_url(); ?>user/karyawan"><i class="shortcut-icon icon-user"></i><span>Users Info</span> </a> </li>
		
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
