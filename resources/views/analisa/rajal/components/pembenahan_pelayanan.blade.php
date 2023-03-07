<!-- Button trigger modal -->
<button type="button" class="btn btn-warning btn-sm" style="border-radius: 10px" data-bs-toggle="modal" data-bs-target="#pembenahan-{{ $px->id }}">
    Perbaikan Pelayanan <span class="badge text-bg-danger"><i class="fas fa-envelope-circle-check"></i></span>
</button>

<!-- Modal -->
<div class="modal fade" id="pembenahan-{{ $px->id }}" tabindex="-1" aria-labelledby="pembenahanLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="pembenahanLabel">Perbaikan Pelayanan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>Pesan dari : {{ $px->nama_pasien }}</h5>
                <p>{{ $px->pelayanan_yang_perlu_dibenahi }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
