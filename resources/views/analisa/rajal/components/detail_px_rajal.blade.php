<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $px->id }}">
    <i class="fas fa-eye"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $px->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pasien {{ $px->nama_pasien }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="{{ $px->nama_pasien }}" readonly>
                    <label for="floatingPassword">Nama Pasien</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="{{ $px->klinik }}" readonly>
                    <label for="floatingPassword">Klinik</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="{{ $px->penjamin }}" readonly>
                    <label for="floatingPassword">Penjamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="{{ $px->no_penjamin }}" readonly>
                    <label for="floatingPassword">No Penjamin</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="{{ $px->no_hp }}" readonly>
                    <label for="floatingPassword">No HP</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingPassword" value="{{ $px->kategori_pasien }}" readonly>
                    <label for="floatingPassword">Kategori Pasien</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a href="https://wa.me/+62{{ $px->no_hp }}" type="button" class="btn btn-success" target="_blank">Hubungi Pasien</a>
            </div>
        </div>
    </div>
</div>








