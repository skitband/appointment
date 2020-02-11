
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js').'?'. time()}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js').'?'. time()}}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js').'?'. time()}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js').'?'. time()}}"></script>
<!-- MDB core JavaScript -->
<!-- Stepper JavaScript -->
<script src="{{asset('js/bs-stepper.min.js').'?'. time()}}"></script>
<script type="text/javascript" src="{{asset('js/addons/datatables.min.js').'?'. time()}}"></script>
<script src="{{asset('js/moment.min.js').'?'. time()}}"></script>
<script src="{{asset('js/fullcalendar.min.js').'?'. time()}}"></script>
<script type="text/javascript" src="{{asset('js/main.js').'?'. time()}}"></script>
<script type="text/javascript" src="{{asset('js/custom.js').'?'. time()}}"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('#calendar').fullCalendar({
            events : [
                @foreach($appointments as $appointment)
                {
                    title : '{{ $appointment->service_name }}',
                    staff: '{{ $appointment->staff_name }}',
                    client: '{{ $appointment->customer_name }}',
                    start : '{{ $appointment->date_time }}',
                    end : '{{ $appointment->date_time_end }}',
                    status: '{{ $appointment->status }}',
                    url : '#',
                    id: '{{ $appointment->id }}',
                    email: '{{ $appointment->customer_email }}',
                    allDay: false,
                    duration: '{{ $appointment->duration }}',
                },
                @endforeach
            ],
            eventRender: function(event, element) { 
            	element.find('.fc-title').append("<br/>" + event.staff + "<br/>" + event.client); 
        	},
        	eventClick:  function(event, jsEvent, view) {
        		$('#modalBody .detail-appointment_id').val(event.id);
	            $('#modalBody .detail-client_name').val(event.client);
	            $('#modalBody .detail-client_email').val(event.email);
	            $('#modalBody .detail-staff_name').val(event.staff);
	            $('#modalBody .detail-service_name').val(event.title);
	            $('#modalBody .detail-date_time').val(moment(event.start).format('YYYY-MM-DD hh:mm:ss'));
	            $('#modalBody .detail-date_time_end').val(moment(event.end).format('YYYY-MM-DD hh:mm:ss'));
	            $('#modalBody .detail_service_duration').val(event.duration);
	            $('#eventUrl').attr('href',event.url);
	            $('#calendarModal').modal();
	            if(event.status === 'approved'){
	            	$('.confirm_appointment').prop('disabled', true);
	            	$('.calculate').prop('disabled', true);
	            }else{
	            	$('.confirm_appointment').prop('disabled', false);
	            	$('.calculate').prop('disabled', false);
	            }
        	},
    })
});
</script>


