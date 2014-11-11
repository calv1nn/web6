<?php include('header.php'); ?>
 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
<link href="<?php echo base_url(); ?>assets/zebra-datepicker/public/css/default.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>assets/zebra-datepicker/public/javascript/zebra_datepicker.js"></script>

<div class="main">
    
    <div class="main-inner">

        <div class="container">
            
         <div class="row">
              
              <div class="span12">
          
                  <div class="widget">
                        
                    <div class="widget-header">
                        <i class="icon-list-alt"></i>
                        <h3>Add Proyek List</h3>
                    </div> <!-- /widget-header -->
                    
                    <div class="widget-content">
                    
                <?php    
                // $kategori = array(
              // ''  => 'Choose option...',
              // 'Perakitan'  => 'Perakitan',
              // 'Instalasi'    => 'Instalasi',
              // 'Konfigurasi' => 'Konfigurasi',
              // 'Quality Control' => 'Quality Control'
            // );
			
			$jam = array(
              ''  => ' ',
              '1'  => '1 Jam',
              '2'  => '2 Jam',
              '3'  => '3 Jam',
              '4'  => '4 Jam',
              '5'  => '5 Jam',
              '6'  => '6 Jam',
              '7'  => '7 Jam',
              '8'  => '8 Jam',
            );
			
            ?>
                <?php echo form_open("detail_proyek/add_detail_proyek/".$kode_proyek); ?>
                            
                <div class="field">
                    <?php echo form_input(array('name' => 'id_pekerjaan', 'value' => '', 'type' => 'hidden' ));?>
                </div> <!-- /field -->
                
                <?php foreach ($proyek as $row)
                {
                ?>
               
                <div class="field">
                    <label for="kode_proyek">Nama_proyek:</label>
                    <?php echo form_input("", $row['nama_proyek'], 'readonly'); ?>
                    <?php echo form_hidden("kode_proyek123", $kode_proyek,'readonly'); ?>
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="jenis_pekerjaan">Nama Pekerjaan:</label>    
                <?php echo form_dropdown('jenis_pekerjaan', $jenis_pekerjaan);?> 
                
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="nik">Penanggung Jawab:</label>    
                <?php echo form_dropdown('nik123', $dropdown);?> 
                
                </div> <!-- /field -->
				
				Team :
				<table border="5" style="width:400px">
						 <?php //echo form_open("load_pekerjaan/add_load_pekerjaan"); ?>
									
						<div class="field">
							<?php echo form_hidden("kode_proyek", $kode_proyek,'readonly'); ?>
						</div> <!-- /field -->
						<th></th>
						<th>Nama Karyawan</th>
						<th>Jam Available</th>
						<?php foreach ($getload as $row2){  ?>
						<tr>
						
							
							<?php 
							if ($row2['jam_sisa'] < 1 ){ 
							// if (1 != 1 ){ 
							// var_dump($row2['jam_sisa'] );exit;
							?>
							
							<td bgcolor="#FF0000">
							<!--<?php echo form_checkbox('nik[]',$row2['nik'], array(), 'onclick="doconfirm()"');  ?>-->
							<?php echo "Max Load Reached"; ?>
							</td>
							<td bgcolor="#FF0000"><?php echo $row2['nama_karyawan']; ?></td> 
							<td bgcolor="#FF0000"><?php echo $row2['jam_sisa']; ?> Jam</td>
							<?php  }
								else {
							?>
							<td>
							<?php echo form_checkbox('nik[]',$row2['nik']);  ?>
							<td color="grey"><?php echo $row2['nama_karyawan']; ?></td> 
							<td><?php echo $row2['jam_sisa']; ?> Jam</td>
							<?php }?>
							</td> 
							
							
							
							
						</tr>
						<?php }?>
					<tr>	<?php
					// echo form_submit('mysubmit', 'ADD');
					echo form_close();	
					?>
					</tr>
					</div> <!-- /login-fields -->
					</table>
				<br>
				
				
				 <div class="field">
                    <label for="jam">Jam/Hari:</label>
                    <?php echo form_dropdown('jam', $jam); ?>
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="start_date">Start Date:</label>
                    <?php echo form_error('start_date'); ?>
                    <?php echo form_input("start_date","","class='datepicker-start'"); ?>
                
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="end_date">End Date:</label>
                    <?php echo form_error('end_date'); ?>
                    <?php echo form_input("end_date","","class='datepicker-end'"); ?>
                </div> 
				
				<div class="field">
                    <label for="keterangan">Keterangan:</label>    
                    <?php echo form_error('keterangan'); ?>
                    <?php echo form_textarea("keterangan",""); ?>
                </div> <!-- /field -->
                
                <!--<div class="field">
                    <label for="nama">Kategori:</label>
                    <?php //echo form_dropdown('kategori', $kategori); ?>
                </div> <!-- /field -->

                <?php 
                }
                ?>
				
				<?php foreach ($date as $row)
                {
                ?>
				
				  <input type="hidden" id="pstart_date"  value="<?php echo $row['start_date']?>" >
                    <input type="hidden" id="pend_date"  value="<?php echo $row['end_date']?>">
					
					<?php 
                }
                ?>
					
                <?php
            echo form_submit('mysubmit', 'ADD');
            echo form_close();    
            ?>
            </div> <!-- /login-fields -->
            
            <div class="login-actions">
            
            
                    </div> <!-- /widget-content -->
                        
                </div> <!-- /widget -->
            </div> <!-- /span6 -->
              
          </div> <!-- /row -->
        </div> <!-- /container -->
        
    </div> <!-- /main-inner -->
    
</div> <!-- /main -->
<script>

$( ".target" ).change(function() {
alert( "Handler for .change() called." );
});


var pstart_date = document.getElementById('pstart_date');
var pend_date = document.getElementById('pend_date');

$('.datepicker-start').Zebra_DatePicker({
  direction: [pstart_date.value, pend_date.value],
  pair: $('.datepicker-end')
});

$('.datepicker-end').Zebra_DatePicker({
   direction: [1, pend_date.value]
});
</script>
<?php include('footer.php');?>
