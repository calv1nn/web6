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

<style type="text/css">
table.imagetable {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: 1px;
	border-color: #999999;
	border-collapse: collapse;
	
}
table.imagetable th {
	background:#b5cfd2 url('cell-blue.jpg');
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
}
table.imagetable td {
	background:#dcddc0 url('cell-grey.jpg');
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #999999;
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
                                    List Karyawan</h3> <?php if($this->session->userdata('admin',TRUE)) { ?> <button class="thumbnail" onclick="location.href='<?php echo base_url();?>user/add_karyawan'">Add</button> <?php } ?>
					
                            </div>
                            <!-- /widget-header -->
                            <div class="widget-content" >
                                <table class="imagetable" style="width:10000px" >
							<tr>
								<th>NIK</th>
								<th>Email</th>
								<th>Nama</th>
								<th>Jabatan</th>
								<th>Status</th>
								<?php if($this->session->userdata('admin',TRUE)) { ?>
								<th>Action</th>
								<?php }?>
							</tr>
							
							
						<?php
							foreach ($query as $row)
								{
						?>
							<tr>
								<td><?php echo $row['nik']?></td>
								<td><?php echo $row['email']?></td>
								<td><?php echo $row['nama_karyawan']?></td>
								<td><?php echo $row['peran']?></td>
								<td><?php if($row['status']==1) {echo "Active" ;
								} else { echo "Inactive" ;
								}?></td>
								<?php if($this->session->userdata('admin',TRUE)) { ?>
								<td><a href="<?php echo site_url ('user/edit_karyawan/'.$row['nik']) ?> " ><button class="btn">Edit</button> </a>
								<a href="<?php echo site_url ('user/delete_karyawan/'.$row['nik']) ?> " onClick="return doconfirm();" ><button class="btn btn-danger">Delete</button> </a>
								<a href="<?php echo site_url ('user/edit_password/'.$row['nik']) ?> " ><button class="btn btn-warning">Reset Password</button> </a>
									</td>
								<?php }?>
							</tr>			
						<?php 
								}
						?>
								</table>
								<div class="halaman">Halaman : <?php echo $halaman;?></div>
                                <!-- /line-chart -->
                            </div>
                            <!-- /widget-content -->
                        </div>
                        <!-- /widget -->
                        
                        <!-- /widget -->
                    </div>
                    <!-- /span6 -->
                  
                        </div>
                        <!-- /widget -->
                        
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
