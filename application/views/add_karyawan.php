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
                   
				    <form action="<?php echo site_url('user/search_nik');?>" method = "post">
				<input type="text" name = "keyword" placeholder="enter NIK"/>
				<input type="submit" value = "Next" />
			</form>
				   
				   </div>
               
               
         </div>
         </div>      
	      	
	  	  <!-- /row -->
	
		    </div> <!-- /span6 -->
	      	
	      	
	      </div> <!-- /row -->
	      
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
<?php include('footer.php');?>
