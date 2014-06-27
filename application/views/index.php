<?php include('header.php'); ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> NOTIFICATIONS</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content">
                  
				  <?php

				foreach($proyek as $cek) {
				$end = explode('-', $cek['end_date']);
				$end_date = $end[2];
				$end_date1= $end[1];
				$end_date2= $end[0];

				date('Y-m-d');
				$start = explode('-',date('Y-m-d'));
				$start_date = $start[2];
				$start_date1= $start[1];
				$start_date2= $start[0];
				//print_r(date('Y-m-d'));die;
				$jd1 = GregorianToJD($end_date1, $end_date, $end_date2);
				$jd2 = GregorianToJD($start_date1, $start_date, $start_date2);

				$date_sel = $jd1 - $jd2;
				
				if ($date_sel <= 3 and $cek['progress']<=80){
			?>	
				<li class="alert"><a href="#">
					<?php 
						echo "Proyek " .(" "). $cek['nama_proyek']. (" "). "berakhir dalam" . (" ").$date_sel. (" "). "hari";
					?>
				</a><button class="close" data-dismiss="alert" type="button">×</button>
				   </li>
			<?php }	
			}?>
				
				
                </div>
                <!-- /widget-content --> 
                </div>
        
          </div>
          </div>
         
          
        </div>
        <!-- /span6 -->
        <div class="span6">
          <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Important Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> <a href="<?php echo base_url(); ?>proyek/index" class="shortcut"><i class="shortcut-icon icon-list-alt"></i><span
                                        class="shortcut-label">List Proyek</span> </a>
										
											<a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-signal"></i> <span class="shortcut-label">Reports</span> </a>
											<a href="<?php echo base_url(); ?>diskusi/index"" class="shortcut"> <i class="shortcut-icon icon-comment"></i><span class="shortcut-label">Diskusi</span> </a>
											<a href="<?php echo base_url(); ?>user/karyawan" class="shortcut"><i class="shortcut-icon icon-user"></i><span class="shortcut-label">Users</span> </a>
												 </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          <div class="widget">
           <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Recent Discussion</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <ul class="news-items">
                
            <div class="widget-content">
              <ul class="news-items">
			  <?php
						foreach ($hasil->result() as $row) 
								{
								$isi = $row->isi;
								$row->isi = substr($isi, 0, 50);
						//print_r($row->isi);die;
					?>
                <li>
                  
                  <div class="news-item-date"> <span class="news-item-day"><?php echo date('d',strtotime($row->tanggal)); ?></span> <span class="news-item-month"><?php echo date('M',strtotime($row->tanggal));?> - <?php echo date('y',strtotime($row->tanggal));?></span> </div>
                  <div class="news-item-detail"> <a href='<?php echo base_url();?>diskusi/view_diskusi/<?php echo $row->id;?>'; > 
					<?php echo ($row->judul); ?> </a>
                    <p class="news-item-preview"><?php echo ($row->isi); ?> </p>
                  </div>
                 
                </li>
               <?php
						};
						?>
              </ul>
            </div>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget -->
          
          
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

<!-- disini -->

<?php include('footer.php'); ?>

<script>     

        var lineChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    pointColor: "rgba(220,220,220,1)",
				    pointStrokeColor: "#fff",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    pointColor: "rgba(151,187,205,1)",
				    pointStrokeColor: "#fff",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }

        var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


        var barChartData = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [
				{
				    fillColor: "rgba(220,220,220,0.5)",
				    strokeColor: "rgba(220,220,220,1)",
				    data: [65, 59, 90, 81, 56, 55, 40]
				},
				{
				    fillColor: "rgba(151,187,205,0.5)",
				    strokeColor: "rgba(151,187,205,1)",
				    data: [28, 48, 40, 19, 96, 27, 100]
				}
			]

        }    

        $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var calendar = $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.fullCalendar('renderEvent',
                {
                  title: title,
                  start: start,
                  end: end,
                  allDay: allDay
                },
                true // make the event "stick"
              );
            }
            calendar.fullCalendar('unselect');
          },
          editable: true,
          events: [
            {
              title: 'All Day Event',
              start: new Date(y, m, 1)
            },
            {
              title: 'Long Event',
              start: new Date(y, m, d+5),
              end: new Date(y, m, d+7)
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d-3, 16, 0),
              allDay: false
            },
            {
              id: 999,
              title: 'Repeating Event',
              start: new Date(y, m, d+4, 16, 0),
              allDay: false
            },
            {
              title: 'Meeting',
              start: new Date(y, m, d, 10, 30),
              allDay: false
            },
            {
              title: 'Lunch',
              start: new Date(y, m, d, 12, 0),
              end: new Date(y, m, d, 14, 0),
              allDay: false
            },
            {
              title: 'Birthday Party',
              start: new Date(y, m, d+1, 19, 0),
              end: new Date(y, m, d+1, 22, 30),
              allDay: false
            },
            {
              title: 'EGrappler.com',
              start: new Date(y, m, 28),
              end: new Date(y, m, 29),
              url: 'http://EGrappler.com/'
            }
          ]
        });
      });
    </script><!-- /Calendar -->

	

</body>
</html>