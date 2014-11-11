<?php if(is_array($laporan)) : ?>
 <?php foreach($laporan as $row) : ?>
 <img src="<?php echo base_url().'assets/upload/'.$row['nama_file']; ?>" />
 <?php endforeach; ?>
 <?php endif; ?>