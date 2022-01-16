 <div id="meetings"></div>

<script type="text/javascript">
   
    var events = <?php echo json_encode($data) ?>;
    
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
           
    $('#meetings').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'agendaDay,agendaWeek,month,'
      },
      buttonText: {
        today: 'TODAY',
        month: 'THIS MONTH',
        week : 'THIS WEEK',
        day: 'TODAY'
      },
      events    : events,
      defaultView: 'agendaDay'
    })
</script>