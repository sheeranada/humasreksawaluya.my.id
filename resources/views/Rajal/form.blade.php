@extends('base.base1')
@section('judul','Form Survey Pasien')
@section('konten')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <figure class="text-center">
                <blockquote class="blockquote">
                  <h3>RS REKSA WALUYA</h3>
                </blockquote>
                <figcaption class="blockquote-footer">
                  Survey Kepuasan Pasien <cite title="Source Title">Rawat Jalan</cite>
                </figcaption>
              </figure>
              <hr style="color: blue;">
        </div>
    </div>
</div>
<div class="container mt-3">
    <form action="{{ route('rajal_simpan') }}" method="POST" class="was-validated" onsubmit="alert()">
        @csrf
        {{-- identitas pasien --}}
        @include('Rajal.components.form.identitas')
        {{-- end identitas pasien --}}
        <div class="row mt-2">
            <div class="col">
                <div class="card" style="border-radius: 10px;">
                    <div class="card-header">
                        <h5>Form Survey Pasien Rawat Jalan</h5>
                    </div>
                    @include('Rajal.components.form.kategori_paseien')
                    <hr>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                @include('Rajal.components.form.sarpras')
                                <hr>
                                @include('Rajal.components.form.sdm')
                                <hr>
                                @include('Rajal.components.form.administrasi')
                                <hr>
                                @include('Rajal.components.form.farmasi')
                                <hr>
                                @include('Rajal.components.form.pelayanan')
                                <hr>
                                @include('Rajal.components.form.ruang_tunggu')
                                <hr>

                                <div class="form-check mb-3 justify-content-end">
                                    <input type="checkbox" class="form-check-input" id="validationFormCheck1" required>
                                    <label class="form-check-label" for="validationFormCheck1">Saya menyatakan bahwa data tersebut benar</label>
                                    <div class="invalid-feedback">Validasi</div>
                                </div>

                                <div class="card-body mt-5">
                                    <button class="btn btn-primary btn-lg text-center d-flex float-end justify-content-end align-items-end align-content-end me-auto" role="button" type="submit">SUBMIT</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script>
    function alert() {
        swal("Terima Kasih!", "Data telah terkirim!", "success");
    }
</script>
@endsection
