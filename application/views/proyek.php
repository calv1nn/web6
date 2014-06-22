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
                                <i class="shortcut-icon icon-user"></i>
                                <h3>
                                    List Proyek</h3> <button class="thumbnail" onclick="location.href='<?php echo base_url();?>proyek/add_proyek'">Add</button>
					
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table class="table table-striped table-bordered">
							<tr>
								<th>Nama Proyek</th>
								<th>Nama Client</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Progress</th>
								<th>Action</th>
							</tr>
						<?php
							foreach ($proyek as $row)
								{
								//print_r($row['kode_proyek']);die;
						?>
							<tr>
								<td><a href='<?php echo base_url();?>detail_proyek/view_detail_proyek/<?php echo $row['kode_proyek'];?>';><?php echo $row['nama_proyek'];?></a></td>
								<td><?php echo $row['client']?></td>
								<td><?php echo date('d-M-Y',strtotime("$row[start_date]"));?></td>
								<td><?php echo date('d-M-Y',strtotime("$row[end_date]"));?></td>
								<td><?php echo $row['progress']?>%</td>
								<td><?php echo anchor(
														"proyek/edit_proyek/".$row['kode_proyek'], 'Edit', 'title="Edit a User"');  ?> | <?php echo anchor(
								"load_pekerjaan/view_load_pekerjaan/".$row['kode_proyek'], 'View Pekerja', 'title="View Pekerja"'); ?></td>
							</tr>			
						<?php 
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
                                    Pie Chart</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <img src="<?php echo base_url();?>proyek/gantt_proyek"/>
                                <!-- /pie-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                    </div>
                    <!-- /span6 -->
                  
                        </div>
                        <!-- /widget -->
                        <div class="widget">
                            <div class="widget-header">
                                <i class="icon-bar-chart"></i>
                                <h3>
                                    A Chart</h3>
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <canvas id="line-chart" class="chart-holder" width="538" height="250">
                                </canvas>
                                <!-- /-chart -->
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
