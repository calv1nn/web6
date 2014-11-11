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
			<form action="<?php echo site_url('diskusi/search_keyword');?>" method = "post">
				<input type="text" name = "keyword" placeholder="find a discussion"/>
				<input type="submit" value = "Search" />
			</form>
	      <div class="row">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-th-large"></i>
						<h3>DISKUSI</h3> <button class="thumbnail" onclick="location.href='<?php echo base_url();?>diskusi/tambah'">Add</button>
					</div> <!-- /widget-header -->
					<div class="widget-content">

					<?php
						foreach ($hasil->result() as $row) :
						$isi = $row->isi;
						$isi = substr($isi, 0, 500);
					?>
					<table>
					<tr>
						<td>
						<font size="5"><b><a href='<?php echo base_url();?>diskusi/view_diskusi/<?php echo $row->id;?>'; > 
					<?php echo $row->judul; ?> </a></b></font> | <font size="2"><?php echo date('d-M-Y',strtotime($row->tanggal)); ?> </font>
						</td>
						</td>
					</tr>
					<tr>
						<td><?php echo $isi; ?></td>
					</tr>
					<tr>
						<td><a href='<?php echo base_url();?>diskusi/delete_diskusi/<?php echo $row->id;?>'>Delete</a> | <a href='<?php echo base_url(); ?>diskusi/edit_diskusi/<?php echo $row->id;?>'>Edit</a> </td>
					</tr>
					</table><hr>
					
					<?php
						endforeach;
						?>
						<div class="container">
					<?php echo $this->pagination->create_links();				
					?>
					</div>
					</div>
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->					
				
		    </div> <!-- /span12 -->     	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->
    


<?php include('footer.php'); ?>