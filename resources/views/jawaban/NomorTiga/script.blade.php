<script type="text/javascript">
	
	$(document).ready(function() {
		$('.table-schedule').DataTable({
			language: {
				paginate: {
					next: '<i class="bi bi-arrow-right"></i>',
					previous: '<i class="bi bi-arrow-left"></i>'
				},
				emptyTable: "Data tidak ditemukan",
			},
			ajax: {
				url: '{{ route('event.get-data') }}', 
				dataSrc: ''
			},
			columns: [
				{ 
					data: null, 
					render: function(data, type, row, meta) {
						return meta.row + 1; 
					}
				},
				{ data: 'name' },
				{ data: 'start' },
				{ data: 'end' },
				{ data: 'id', render: function(data) {
					return `
						<button class="btn btn-primary btn-sm edit-btn" data-id="${data}">
							<i class="bi bi-pencil-square"></i> <!-- Ikon pensil -->
						</button>
						<button class="btn btn-danger btn-sm delete-btn" data-id="${data}">
							<i class="bi bi-trash"></i> <!-- Ikon tempat sampah -->
						</button>
					`;
				}}
			]
		});

	
		$(document).on('click', '.edit-btn', function() {
			var eventId = $(this).data('id'); 
			$.ajax({
				method: "GET", 
				url: "{{ route('event.get-selected-data') }}", 
				data: { id: eventId },
				success: function(response) {
					$('#event-id').val(response.id);
					$('#name').val(response.name);
					$('#start').val(response.start);
					$('#end').val(response.end);
					var myModal = new bootstrap.Modal(document.getElementById('updateModal'));
					myModal.show();

				}
			});
		});
	});


	$(document).on('click', '.delete-btn', function() {
		var id = $(this).data('id');
		
		if (confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
			$.ajax({
				url: '{{ route('event.delete') }}',
				method: 'POST',
				data: { id: id, _token: '{{ csrf_token() }}' },
				success: function(response) {
					$('.table-schedule').DataTable().ajax.reload();
				}
			});
		}
	});

</script>