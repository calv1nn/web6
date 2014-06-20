<?php include('header.php'); ?>

<style>

</style>

    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-header">
                                <i class="shortcut-icon icon-user"></i>
                                <h3>
								
								List Laporan </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table class="table table-striped table-bordered">
						
							<tr>
								<th>Nama File</th>
								<th>Tanggal Upload</th>
								<th>Status</th>
								<th colspan="3">Action</th>
								
							</tr>
						<?php
							foreach ($detail_proyek as $row)
								{
						?>
			<?php echo  form_open('detail_proyek/update_status_laporan'); ?>
			<?php echo form_hidden('id_laporan', $row['id_laporan']); ?>
			<tr>
				<td style="display:none"><?php echo $row['id_laporan']?></td>
                <td><?php echo $row['nama_file']?></td>
                <td><?php echo $row['tanggal_upload']?></td>
                <td><?php if ( $row['status_laporan']== 0) { echo "On Going"; }
								elseif  
									( $row['status_laporan']== 1) { echo "Approved"; }
								else
								{
										echo "Rejected" ;
								}
									
                ?> </td>
				<td><a href="<?php echo site_url('detail_proyek/download/'.$row['id_laporan']); ?>"><button class="btn btn-info">Download</button></a> </td>
				<td><?php
				echo form_submit('mysubmit', 'Approve','class="btn btn-success"');
				echo form_close();?> <?php echo form_close();?>	</td>
				
			<?php echo form_open('detail_proyek/update_status_laporan2'); ?>
			<?php echo form_hidden('id_laporan', $row['id_laporan']); ?>
			
				<td style="display:none"><?php echo $row['id_laporan']?></td>
                <td style="display:none"><?php echo $row['nama_file']?></td>
                <td style="display:none"><?php echo $row['status_laporan']?> </td>
			<td>
				<?php
				echo form_submit('mysubmit', 'Reject','class="btn btn-danger"');
				echo form_close();?> <?php echo form_close();?>	
			</td>
					
						<?php 
								}
						?>
						
						
								</table>
                                <!-- /line-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                       
                        
                    </div>
                    <!-- /span6 -->
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
<?php include('footer.php'); ?>
