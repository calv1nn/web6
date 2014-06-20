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

<script>
function doconfirm()
{
    job=confirm("Are you sure to delete permanently?");
    if(job!=true)
    {
        return false;
    }
}
</script>

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
                                    List Karyawan</h3> <button class="thumbnail" onclick="location.href='<?php echo base_url();?>user/add_karyawan'">Add</button>
					
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table border="10" style="width:10000px">
							<tr>
								<th>NIK</th>
								<th>Email</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						<?php
							foreach ($karyawan as $row)
								{
						?>
							<tr>
								<td><?php echo $row['nik']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['nama_karyawan']?></td>
								<td><?php echo $row['jabatan']?></td>
								<td><?php if($row['status']==1) {echo "Active" ;
								} else { echo "Inactive" ;
								}?></td>
								<td><a href="<?php echo site_url ('user/delete_karyawan/'.$row['nik']) ?> " onClick="return doconfirm();" ><button class="btn btn-danger">Delete</button> </a>
									<a href="<?php echo site_url ('user/edit_karyawan/'.$row['nik']) ?> " ><button class="btn">Edit</button> </a>
								</td>
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
                                <canvas id="pie-chart" class="chart-holder" width="538" height="250">
                                </canvas>
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
