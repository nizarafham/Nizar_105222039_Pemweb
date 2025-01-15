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
                url: '{{ route('event.getData') }}', // Endpoint untuk mengambil data
                dataSrc: ''
            },
            columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'start' },
                { data: 'end' },
                { data: 'id', render: function(data) {
                    return `
                        <button class="btn btn-primary edit-btn" data-id="${data}">Edit</button>
                        <button class="btn btn-danger delete-btn" data-id="${data}">Delete</button>
                    `;
                }}
            ]
        });
    });
</script>