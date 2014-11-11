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
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<?php foreach($view->result()as $row): ?>
						<h3>DISKUSI</h3><button class="thumbnail" onclick="location.href='<?php echo base_url(); ?>diskusi/tambah_balasan/<?php echo $row->id;?>'">POST REPLY</button>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">

							
					<div>
					<div> <font size=8 color=grey>
					<?php echo $row->judul; ?> </font></div>
					<div><font size="2"><?php echo $row->penulis; ?>|<?php echo date ('d-M-Y',strtotime($row->tanggal)); ?> </font> </br></div></br>
					<div><font size=4><?php echo $row->isi; ?> 
					</font></div>
				
					<?php endforeach; ?>
					
					</div>
					</div> <!-- /widget-content -->
					<?php foreach($view_balasan->result() as $row1): ?>
					
					<div class="widget-header">
					<h3>Reply From <?php echo $row1->penulis; ?> | <?php echo date ('d-M-Y',strtotime($row1->tanggal_balasan)); ?> </h3>
					</div>
					<div class="widget-content">
					
					
					<?php echo($row1->isi);?>
					</div>
					<?php endforeach; ?>
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    


<?php include('footer.php'); ?>