<div class="row">
    <div class="col">
        <div class="card" style="border-radius: 10px;">
            <div class="card-header">
                <h4>Identitas Pasien <small>(*Harap dipastikan bahwa data tersebut benar)</small></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($datapxrajal as $px)
                    <input type="hidden" name="no_upf" value="{{ $px->no_upf }}">
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" value="{{ $px->nama }}" readonly name="nama_pasien">
                            <label class="form-label" for="floatingInput">Nama Pasien</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->penjamin }}" name="penjamin">
                            <label class="form-label" for="floatingInput">Penjamin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->no_penjamin }}" name="no_penjamin">
                            <label class="form-label" for="floatingInput">No. Penjamin</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" value="{{ $px->id_card }}" readonly name="id_card">
                            <label class="form-label" for="floatingInput">ID Card</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->id_number }}" name="id_number">
                            <label class="form-label" for="floatingInput">ID Number</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->id_pasien }}" name="no_rm">
                            <label class="form-label" for="floatingInput">No. RM</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->hp }}" name="no_hp">
                            <label class="form-label" for="floatingInput">No HP</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->poli }}" name="klinik">
                            <label class="form-label" for="floatingInput">Klinik</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" placeholder="" readonly value="{{ $px->tgl_jam }}" name="tgl_daftar">
                            <label class="form-label" for="floatingInput">Tanggal Daftar</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
