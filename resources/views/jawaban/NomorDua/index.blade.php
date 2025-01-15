<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" method="POST" action="{{ route('event.submit') }}">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nama Jadwal</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan Nama Jadwal" required>
                </div>
                <div class="form-group">
                    <label for="start">Tanggal Mulai</label>
                    <input type="date" name="start" id="start" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="end">Tanggal Selesai</label>
                    <input type="date" name="end" id="end" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
            </div>
        </form>
    </div>
</div>
