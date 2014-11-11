<?php include('header.php'); ?>

<style>
table, td, th
{
border:1px solid green;
}
th
{
background-color:grey;
color:white;
}

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
                    <div class="span6">
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-header">
                                <i class="shortcut-icon icon-user"></i>
                                <h3>
								<?php foreach ($prog as $row)
									{
								 ?>
								Edit Progress - <?php echo $row['nama_pekerjaan'] ?>
								</h3> 

							</div>
                            <!-- /widget-header -->
                            <div class="widget-content">      
								<?php echo form_open("detail_proyek/edit_progress"); ?>
								 
									<div class="field">
										<label for="progress_pek">Progress:</label>
										<?php echo form_input('progress_pek', $row['progress']); ?> %
										<?php echo form_hidden('id_pekerjaan', $id_pekerjaan); ?>
									</div> <!-- /field -->		
								<?php } ?>
								<?php
								echo form_submit('mysubmit', 'EDIT');
								echo form_close();    
								?>
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                        
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
<?php include('footer.php'); ?>
