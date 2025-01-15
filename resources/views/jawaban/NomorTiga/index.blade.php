<table class="table table-schedule">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Start</th>
            <th>End</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data akan dimuat oleh DataTable via Ajax -->
    </tbody>
</table>

<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.update') }}">
            @csrf
            <input type="hidden" name="id" id="event-id"> 
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama Jadwal</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="start">Tanggal Mulai</label>
                    <input type="date" class="form-control" name="start" id="start" required>
                </div>
                <div class="form-group">
                    <label for="end">Tanggal Selesai</label>
                    <input type="date" class="form-control" name="end" id="end" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
