<style type="text/css">
    @media only screen and (max-width: 800px) {
      #unseen table td:nth-child(2), 
      #unseen table th:nth-child(2) {display: none;}
    }
    @media only screen and (max-width: 640px) {
      #unseen table td:nth-child(4),
      #unseen table th:nth-child(4),
      #unseen table td:nth-child(7),
      #unseen table th:nth-child(7),
      #unseen table td:nth-child(8),
      #unseen table th:nth-child(8){display: none;}
    }
    td {
        word-wrap:break-word!important;
    }
</style>

<style>
    body {
        margin: 40px 10px;
        padding: 0;
        font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
        font-size: 14px;
    }
    #calendar {
        max-width: 900px;
        margin: 0 auto;
    }
    .table-striped>tbody>tr:nth-child(odd)>td, .table-striped>tbody>tr:nth-child(odd)>th{
      background-color: #013562 !important;
    }
    .btn:hover, .btn:focus, .btn.active, .btn[disabled], .btn.disabled{
      background-color: #3c5f7d !important;
    }
    .btn{
          border: 1px solid;
    }
</style>
<?php 
  include('header.php');
  include('sidebar.php');

  $user_id=$this->session->userdata('id');
?> 
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link href='<?php echo base_url(); ?>assets/calender/fullcalendar.min.css' rel='stylesheet' />
<!--<link href='<?php echo base_url(); ?>assets/calender/fullcalendar.print.min.css' rel='stylesheet' media='print' />-->
<div id="content"> 
  <div class="container"> 
      <div class="page-header">  
          <div class="page-title">
              <h3 style="color: #850035;margin-bottom: -10%">Service</h3>
          </div>
      </div> 
      <div class="row">
        <div class="col-md-12">
          <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="fa fa-table"></i>Agenda (spe_id:<?php echo $user_id; ?>)</div>
                <div class="actions">
                       
                </div>
            </div>
            <div class="portlet-body">
                 <div id='calendar'></div>
            </div>
      </div>
  </div>
 </div>
</div>  
<?php include 'footer.php'; ?>
<script src='<?php echo base_url(); ?>assets/calender/moment.min.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>assets/calender/jquery.min.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>assets/calender/fullcalendar.min.js' type="text/javascript"></script>
<script src='<?php echo base_url(); ?>assets/calender/locale-all.js' type="text/javascript"></script>
<script>
    $(document).ready(function() {

		var calendar = $('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaDay,agendaWeek,month,listMonth'
			},
			businessHours: {
				// days of week. an array of zero-based day of week integers (0=Sunday)
				dow: [ 1, 2, 3, 4 ,5,6], // Monday - Thursday

				start: '08:00', // a start time (10am in this example)
				end: '20:00', // an end time (6pm in this example)
			},
			defaultDate: Date.now(),
			locale: 'fr',
			slotDuration: '00:15:00',
	   		slotLabelFormat: 'HH:mm',
			minTime: '08:00:00',
			maxTime: '20:00:00',
			slotEventOverlap: false,
			//eventColor: 'red',
			allDayDefault: false,
			buttonIcons: true, // show the prev/next text
			weekNumbers: true,
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: "http://www.123-clic.fr/fullcalendar/events.php?speid=<?php echo $user_id; ?>",
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) {
			 var title = prompt('Nouveau rendez-vous:');
			 if (title) {
			 start = $.fullCalendar.formatDate(start, "YYYY-MM-DD HH:mm:ss");
			 end = $.fullCalendar.formatDate(end, "YYYY-MM-DD HH:mm:ss");
			 $.ajax({
			 url: 'http://www.123-clic.fr/fullcalendar/add_events.php',
			 data: 'title='+ title+'&start='+ start +'&end='+ end +'&speid='+ <?php echo $user_id; ?>,
			 type: "POST",
			 success: function(json) {
			 alert('Le rendez-vous a été ajouté.');
			 }
			 });
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
			eventDrop: function(event, delta) {
			 start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
			 end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
			 $.ajax({
			 url: 'http://www.123-clic.fr/fullcalendar/update_events.php',
			 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
			 type: "POST",
			 success: function(json) {
			 alert("Le rendez-vous a été déplacé.");
			 }
			 });
			},
			eventResize: function(event) {
			 start = $.fullCalendar.formatDate(event.start, "YYYY-MM-DD HH:mm:ss");
			 end = $.fullCalendar.formatDate(event.end, "YYYY-MM-DD HH:mm:ss");
			 $.ajax({
			 url: 'http://www.123-clic.fr/fullcalendar/update_events.php',
			 data: 'title='+ event.title+'&start='+ start +'&end='+ end +'&id='+ event.id ,
			 type: "POST",
			 success: function(json) {
			 alert("OK");
			 }
			 });

			},
			eventClick: function(event) {
				if (confirm('Voulez-vous supprimer ce rendez-vous ?')) {
				$.ajax({
				url: 'http://www.123-clic.fr/fullcalendar/delete_events.php',
				data: 'id=' + event.id,
				type: 'POST',
				success: function(json) {
				alert("Le rendez-vous a été supprimé.");
				location.reload();
				}
				});
				}

			}
		});
		
	});
   
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>