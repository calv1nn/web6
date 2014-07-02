<?php include('header.php'); ?>

<style>


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
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3> List Proyek</h3> <?php if($this->session->userdata('pm',TRUE)) { ?> <button class="thumbnail" onclick="location.href='<?php echo base_url();?>proyek/add_proyek'">Add</button> <?php }?>
				
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">
						<ul class="nav nav-tabs">
						  <li  class="active">
						    <a href="<?php echo base_url();?>proyek/index2">Finished Project</a>
						  </li>
						  <li ><a href="<?php echo base_url();?>proyek/index" >On Going Project</a></li>
						</ul>
						
						<br>
						
							<div class="tab-content">
								<div class="tab-pane" id="formcontrols">
								<form id="edit-profile" class="form-horizontal">
									<fieldset>
										
										  aaa
									</fieldset>
								</form>
								</div>
								
								<div class="tab-pane active" id="jscontrols">
									<form id="edit-profile2" class="form-vertical">
										<fieldset>
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
								<td>
										<div class="progress progress-striped">
											<div class="bar" style="width: <?php echo $row['progress']?>%;"></div>
                                        </div> <?php echo $row['progress']?> %
								</td>
								<td>
								<?php if($this->session->userdata('pm',TRUE)) { ?>
								<?php echo anchor(
														"proyek/edit_proyek/".$row['kode_proyek'], 'Edit', 'title="Edit Proyek"');  ?> | <?php }?> <?php echo anchor(
								"load_pekerjaan/view_load_pekerjaan/".$row['kode_proyek'], 'View Pekerja', 'title="View Pekerja"'); ?></td>
							</tr>			
						<?php 
								}
						?>
								</table>
										</fieldset>
									</form>
								</div>
								
							</div>
						  
						  
						</div>
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    
    
<?php include('footer.php'); ?>