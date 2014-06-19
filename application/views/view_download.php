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
								
								List Proyek </div>
                            <!-- /widget-header -->
                            <div class="widget-content">
                                <table border="10" style="width:10000px">
						
							<tr>
								<th>Nama File</th>
								<th>Action</th>
								
							</tr>
						<?php
							//foreach ($detail_proyek as $row)
							foreach ($detail_proyek as $row)
								{
							//	print_r($row);die;
						?>
							<tr>
								<td><?php echo $row['nama_file']?></td>
								<td> <a href="<?php echo site_url('detail_proyek/download/'.$row['id_laporan']); ?>">Download</a></td>
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