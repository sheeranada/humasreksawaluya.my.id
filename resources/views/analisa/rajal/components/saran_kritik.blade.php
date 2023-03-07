<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" style="border-radius: 10px" data-bs-toggle="modal" data-bs-target="#saran-{{ $px->id }}">
    Saran dan Kritik <span class="badge text-bg-danger"><i class="fas fa-envelope"></i></span>
</button>

<!-- Modal -->
<div class="modal fade" id="saran-{{ $px->id }}" tabindex="-1" aria-labelledby="saranLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="saranLabel">Saran dan Kritik</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Pesan dari : {{ $px->nama_pasien }}</h5>
                <p>{{ $px->saran_kritik }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
