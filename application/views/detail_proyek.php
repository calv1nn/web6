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
                    <div class="span12">
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-header">
                                <i class="shortcut-icon icon-tasks"></i>
                                <h3>
								<?php foreach ($nama_proyek as $row2)
								{
									$nama_proyek = $row2['nama_proyek'];
								}?>
								List Proyek <?php echo $row2['nama_proyek'];?> </h3> 
								<?php if($this->session->userdata('pm',TRUE)) { ?>
								<button class="thumbnail" onclick="location.href='<?php echo base_url();?>detail_proyek/add_detail_proyek/<?php echo $row2['kode_proyek'];?>'">Add</button>
								<?php }?>
							</div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table class="CSSTableG">
						<?php
							if ($detail_proyek == null) {
						?>
							<tr>
								<th>Nama Pekerjaan</th>
								<th>Penanggung Jawab</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Progress</th>
								<th>Keterangan</th>
							</tr>
							<?php }
							else
							{
							?>
							<tr>
								<th>Nama Pekerjaan</th>
								<th>Penanggung Jawab</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Progress</th>
								<th>Keterangan</th>
								<th>Action</th>
							</tr>
						<?php
							//foreach ($detail_proyek as $row)
							foreach ($detail_proyek as $row)
								{
							//	print_r($row);die;
						?>
							<tr>
								<td><?php echo $row['nama_pekerjaan']?></td>
								<!--<td><?php //echo $row['nama_karyawan']?></td>-->							
			<td><?php echo anchor(
			"detail_proyek/view_team/".$row['id_pekerjaan'], $row['nama_karyawan'], 'title="View Team"'); ?></td>
								<?php //echo date('d-M-Y',strtotime("$row[start_date]"));?>
								<td><?php echo $row['start_date'];?></td>
								<td><?php echo $row['end_date'];?></td>
								<td><?php echo $row['progress']?>%</td>
<!--
								<td><?php// echo $row['status_laporan']?></td>
-->
								<td><?php echo $row['keterangan']?></td>
								<td>
								<?php if($this->session->userdata('email',TRUE)) { ?>
								<?php echo anchor(
		"detail_proyek/upload/".$row['id_pekerjaan'], 'Upload', 'title="Upload Laporan"'); ?> |<?php }?> <?php echo anchor(
		"detail_proyek/view_download/".$row['id_pekerjaan'], 'View Laporan', 'title="View Laporan"'); ?> <?php if($this->session->userdata('pm',TRUE)) { ?> | <?php echo anchor(
		"detail_proyek/edit_detail_proyek/".$row['kode_proyek'].("/").$row['id_pekerjaan'], 'Edit', 'title="Edit"'); ?> | <?php echo anchor(
		"detail_proyek/progress/".$row['id_pekerjaan'], 'Progress', 'title="Edit Progress"'); ?>
		<?php }?>
								</td>
							</tr>			
						<?php 
								}
						}
						?>
						
						
								</table>
                                <!-- /line-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3>
								
                                    Gantt Chart</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <img src="<?php echo base_url();?>detail_proyek/chart"/>
                                <!-- /pie-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                    </div>
                    <!-- /span6 -->
                  
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
