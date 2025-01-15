<script type="text/javascript">
	
    document.addEventListener('DOMContentLoaded', function() {
		var calendarEl = document.getElementById('calendar');
		
		var calendar = new FullCalendar.Calendar(calendarEl, {
			initialView: 'dayGridMonth', 
			events: function(info, successCallback, failureCallback) {
				$.ajax({
					url: '{{ route('event.get-json') }}', 
					dataType: 'json',
					success: function(data) {
						successCallback(data); 
					},
					error: function() {
						failureCallback(); 
					}
				});
			},
			eventColor: 'blue', 
			eventClick: function(info) {
				alert('Event: ' + info.event.title);
			}
		});
		
		calendar.render(); 
	});

</script>