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
                                <i class="shortcut-icon icon-tasks"></i>
                                <h3>
								
								List Laporan </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
							
							 <?php
									foreach($detail_proyek as $cek) {
									$end = explode('-', $cek['end_date']);
									$end_date = $end[2];
									$end_date1= $end[1];
									$end_date2= $end[0];

									$start = explode('-',$cek['start_date']);
									// var_dump($cek['start_date']);exit;
									$start_date = $start[2];
									$start_date1= $start[1];
									$start_date2= $start[0];
									
									$sysdatea = explode('-',$cek['sysdate']);
									// var_dump($cek['sysdate']);exit;
									$sysdatea0 = $sysdatea[2];
									$sysdatea1= $sysdatea[1];
									$sysdatea2= $sysdatea[0];
									//print_r(date('Y-m-d'));die;
									$jd1 = GregorianToJD($end_date1, $end_date, $end_date2);
									$jd2 = GregorianToJD($start_date1, $start_date, $start_date2);
									$sysdate2 = GregorianToJD($sysdatea1, $sysdatea0, $sysdatea2);

									$date_sel = $jd1 - $jd2;
									// var_dump($date_sel);exit;
									// print_r($date_sel);die;
									}
							?>
				<?php
					
				
				
					foreach ($detail_proyek as $row)
								{
								// print_r(count($detail_proyek));die;
								$date_sel = $date_sel+1;
								$tnggl = date("Y-m-d");
								$tngglend = $cek['end_date'];
								$tngglstart = $cek['start_date'];
								if(strtotime($tnggl)> strtotime($tngglstart)){
									if(strtotime($tnggl)< strtotime($tngglend)){								
									$sisatgl = $jd1 - $sysdate2;
									// var_dump($sisatgl);exit;
									}
								}
								else{
								$sisatgl = 0;
								}
								// $diff = abs(strtotime($date2) - strtotime($date1));
								// var_dump($detail_proyek);exit;
								$a=(count($detail_proyek));
								// print_r($a);die;
																
								$lap=$date_sel-$a;
								
								if($date_sel > $a){
							?>	
							<p class="alert">Laporan Anda Kurang  Silahkan dilengkapi !!<button class="close" data-dismiss="alert" type="button">x</button>
				   </p>
                                <table class="table table-striped table-bordered">
						
							<tr>
								<th>Hari</th>
								<th>Nama File</th>
								<th>Tanggal Upload</th>
								<th>Status</th>
								<th colspan="3">Action</th>
								
							</tr>
							
							<?php $i = 1; ?>
							
						<?php
							
								
						?>
							<?php echo  form_open('detail_proyek/update_status_laporan'); ?>
							<?php echo form_hidden('id_laporan', $row['id_laporan']); ?>
							<?php echo form_hidden('id_pekerjaan', $row['id_pekerjaan']); ?>
			<tr>
				<td style="display:none"><?php echo $row['id_laporan']?></td>
                <td><?php echo $i++ ?></td>
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
			<?php if($this->session->userdata('pm',TRUE) or $this->session->userdata('admin',TRUE)) { ?>
			<td>
				<?php
				echo form_submit('mysubmit', 'Reject','class="btn btn-danger"');
				echo form_close();?> <?php echo form_close();?>	
			</td>
			<?php }?>
					
						<?php 
								}
						else { ?>
							  <table class="table table-striped table-bordered">
						
							<tr>
								<th>Hari</th>
								<th>Nama File</th>
								<th>Tanggal Upload</th>
								<th>Status</th>
								<th colspan="3">Action</th>
								
							</tr>
							
							<?php $i = 1; ?>
							
						<?php
							
								
						?>
							<?php echo  form_open('detail_proyek/update_status_laporan'); ?>
							<?php echo form_hidden('id_laporan', $row['id_laporan']); ?>
							<?php echo form_hidden('id_pekerjaan', $row['id_pekerjaan']); ?>
			<tr>
				<td style="display:none"><?php echo $row['id_laporan']?></td>
                <td><?php echo $i++ ?></td>
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
			<?php if($this->session->userdata('pm',TRUE) or $this->session->userdata('admin',TRUE)) { ?>
			<td>
				<?php
				echo form_submit('mysubmit', 'Reject','class="btn btn-danger"');
				echo form_close();?> <?php echo form_close();?>	
			</td>
			<?php }?>
						
					<?php	}
						
						
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
