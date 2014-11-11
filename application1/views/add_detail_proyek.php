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
                $kategori = array(
              ''  => 'Choose option...',
              'Perakitan'  => 'Perakitan',
              'Instalasi'    => 'Instalasi',
              'Konfigurasi' => 'Konfigurasi',
              'Quality Control' => 'Quality Control'
            );
            ?>
                <?php echo form_open("detail_proyek/add_detail_proyek"); ?>
                            
                <div class="field">
                    <?php echo form_input(array('name' => 'id_pekerjaan', 'value' => '', 'type' => 'hidden' ));?>
                </div> <!-- /field -->
                
                <?php foreach ($proyek as $row)
                {
                ?>
               
                <div class="field">
                    <label for="kode_proyek">Nama_proyek:</label>
                    <?php echo form_input("", $row['nama_proyek'], 'readonly'); ?>
                    <?php echo form_hidden("kode_proyek", $kode_proyek,'readonly'); ?>
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="nama_pekerjaan">Nama Pekerjaan:</label>    
                    <?php echo form_error('nama_pekerjaan'); ?>
                    <?php echo form_input("nama_pekerjaan",""); ?>
                </div> <!-- /field -->
                
                <div class="field">
                    <label for="nik">Penanggung Jawab:</label>    
                <?php echo form_dropdown('nik', $dropdown);?> 
                
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
                    <label for="nama">Kategori:</label>
                    <?php echo form_dropdown('kategori', $kategori); ?>
                </div> <!-- /field -->
                
                
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
