<?php include('header.php'); ?>

<style>
.btn-info2 {
	background-image: -webkit-gradient(linear, 50% 0%, 50% 100%, color-stop(0%, rgba(78, 178, 213, 0)), color-stop(100%, rgba(7, 23, 29, 0.1)));
  background-image: -webkit-linear-gradient(rgba(78, 178, 213, 0), rgba(7, 23, 29, 0.1));
  background-image: -moz-linear-gradient(rgba(78, 178, 213, 0), rgba(7, 23, 29, 0.1));
  background-image: -o-linear-gradient(rgba(78, 178, 213, 0), rgba(7, 23, 29, 0.1));
  background-image: linear-gradient(rgba(78, 178, 213, 0), rgba(7, 23, 29, 0.1));
  background-color: #4eb2d5;
  border-color: #35a7cf #35a7cf #237795;
  border-color: rgba(0, 0, 0, 0.05) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.15);
  color: white;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.15);
  *background-color: #35a7cf;
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
			<?php echo form_hidden('id_pekerjaan', $row['id_pekerjaan']); ?>
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
				<td><a href="<?php echo site_url('detail_proyek/download/'.$row['id_laporan']); ?>">
				<input type="button" value="Download" class="btn-info2"/> </a>
				</td>
				<?php if($this->session->userdata('pm',TRUE)) { ?>
				<td><?php
				echo form_submit('mysubmit', 'Approve','class="btn btn-success"');
				echo form_close();?> <?php echo form_close();?>	</td>
				<?php }?>
			<?php echo form_open('detail_proyek/update_status_laporan2'); ?>
			<?php echo form_hidden('id_laporan', $row['id_laporan']); ?>
			<?php echo form_hidden('id_pekerjaan', $row['id_pekerjaan']); ?>
			
				<td style="display:none"><?php echo $row['id_laporan']?></td>
                <td style="display:none"><?php echo $row['nama_file']?></td>
                <td style="display:none"><?php echo $row['status_laporan']?> </td>
			<?php if($this->session->userdata('pm',TRUE)) { ?>
			<td>
				<?php
				echo form_submit('mysubmit', 'Reject','class="btn btn-danger"');
				echo form_close();?> <?php echo form_close();?>	
			</td>
			<?php }?>
					
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
