<?php include('header.php'); ?>
<?php echo $xinha_java?>  

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<?php  
					if ($edit_diskusi == null) 
						{
					?>
					<h3>Add New Discussion</h3>
					</div> <!-- /widget-header -->
					
					
					<div class="widget-content">
				
					<?php echo form_open('diskusi/add_diskusi'); ?>
					
					<div class="field">
					<label for="Judul">Judul:</label>
					<?php echo form_input("judul","");?>
					</div> <!-- /field -->
					
					
					<div class="field">
					<label for="isi">Isi:</label>
					<?php   
					   $text = array(
					  'name'  => 'isi',
					  'id' => 'isi',
					  'rows' => '1',
					  'cols'  => '70'
					   );

					echo form_textarea($text);
					?>
					</div> <!-- /field -->
					
					<div class="login-actions">
					<?php echo form_submit('submit', 'Submit'); ?>
					<?php echo form_close(); ?>
					</div>
					
					<?php
						} else {
					?>
					<h3>
                                    Edit Discussion</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
					<?php echo form_open('diskusi/update_diskusi'); ?>
					
					<div class="field">
					<label for="Judul">Judul:</label>
					<?php echo form_hidden("id",$edit_diskusi[0]['id']);?>
					<?php echo form_input("judul",$edit_diskusi[0]['judul']);?>
					</div> <!-- /field -->
					
					
					<div class="field">
					<label for="isi">Isi:</label>
					<?php   
					   $text = array(
					  'name'  => 'isi',
					  'id' => 'isi',
					  'rows' => '1',
					  'cols'  => '70',
					  'value'  => $edit_diskusi[0]['isi']
					
					   );

					echo form_textarea($text);
					?>
					</div> <!-- /field -->
					
					<div class="login-actions">
					<?php echo form_submit('submit', 'Submit'); ?>
					<?php echo form_close(); ?>
					</div>
					
					<?php
						}
					?>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    


<?php include('footer.php'); ?>