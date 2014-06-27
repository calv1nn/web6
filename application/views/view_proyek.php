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
								<?php foreach ($nama_proyek as $row2)
								{
									$nama_proyek = $row2['nama_proyek'];
								}?>
								View Proyek <?php echo $row2['nama_proyek'];?> </h3> 
								<?php if ($this->session->userdata('pm') or $this->session->userdata('admin',TRUE)){ ?>
								<button class="thumbnail" onclick="location.href='<?php echo base_url();?>load_pekerjaan/add_load_pekerjaan/<?php echo $row2['kode_proyek'];?>'">Tambah Pekerja</button>
								<?php }?>
							</div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                        <table border="10" style="width:10000px">
						<?php
							if ($load_pekerjaan == null) {
						?>
							<tr>
								
								<th>Pekerja</th>
								
							</tr>
							<?php }
							else
							{
							?>
							<tr>
							
								<th>Pekerja</th>
								
							</tr>
						<?php
							//foreach ($load_pekerjaan as $row)
							foreach ($load_pekerjaan as $row)
								{
							//	print_r($row);die;
						?>
							<tr>
								
								<td><?php echo $row['nama_karyawan']?></td>
								
								
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
                        
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /main-inner -->
    </div>
    <!-- /main -->
<?php include('footer.php'); ?>
