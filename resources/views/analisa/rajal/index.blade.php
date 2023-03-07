@extends('base.base1')
@section('judul','Analisa Rajal')
@include('base.navbar')
@section('konten')
<div class="container-fluid mt-5" style="max-width: 1750px">
    <div class="row">
        <div class="col">
            <div class="card" style="border-radius: 15px">
                <div class="card-body">
                    <div class="card-title mb-3">
                        <h3>ANALISA PASIEN RAWAT JALAN</h3>
                    </div>
                    <table class="table table-sm table-responsive-sm table-bordered table-hover" style="width: 100%" id="table1">
                        <thead>
                            <tr>
                                <th>TANGGAL DAFTAR</th>
                                <th>NAMA</th>
                                <th>FARMASI</th>
                                <th>ADMINISTRASI</th>
                                <th>PELAYANAN</th>
                                <th>RUANG TUNGGU</th>
                                <th>SARANA DAN PRASARANA</th>
                                <th>SDM</th>
                                <th>PILIHAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($px_rajal as $px)
                            <tr>
                                <td>{{ $px->tgl_daftar }}</td>
                                <td>
                                    {{ $px->nama_pasien }} <br>
                                </td>
                                <td>
                                    {{-- farmasi --}}
                                    <div>{!! $px->kecepatan == 'lama' ? 'Kecepatan : lama' : '' !!}</div>
                                    <div>{!! $px->sikap_petugas == 'Tidak Baik' ? 'Sikap Petugas : Tidak Baik' : '' !!}</div>
                                    <div>{!! $px->penjelasan_obat == 'Tidak Jelas' ? 'Penjelasan Obat : Tidak Jelas' : '' !!}</div>
                                    <div>{!! $px->pelayanan_farmasi == 'Tidak Puas' ? 'Pelayanan : Tidak Puas' : '' !!}</div>
                                </td>
                                <td>
                                    {{-- administrasi --}}
                                    <div>{!! $px->pendaftaran == 'Tidak Puas' ? 'Pendaftaran : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->kasir == 'Tidak Puas' ? 'Kasir : Tidak Puas' : ' ' !!}</div>
                                </td>
                                <td>
                                    {{-- pelayanan --}}
                                    <div>{!! $px->kecepatan_pelayanan == 'Tidak Puas' ? 'Kecepatan : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->kemudahan == 'Tidak Puas' ? 'Kemudahan : Tidak Puas' : '' !!}</div>
                                    @include('analisa.rajal.components.pembenahan_pelayanan')
                                </td>
                                <td>
                                    {{-- ruang tunggu --}}
                                    <div>{!! $px->kenyamanan == 'Tidak Puas' ? 'Kenyamanan : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->kebersihan == 'Tidak Puas' ? 'kebersihan : Tidak Puas' : '' !!}</div>
                                    @include('analisa.rajal.components.saran_kritik')
                                </td>
                                <td>
                                    {{-- sarpras --}}
                                    <div>{!! $px->sarana == 'tidak puas' ? 'sarana : tidak puas' : '' !!}</div>
                                    <div>{!! $px->prasarana == 'tidak puas' ? 'prasarana : tidak puas' : '' !!}</div>
                                    <div>{!! $px->fasilitas_lain == 'tidak puas' ? 'fasilitas_lain : tidak puas' : '' !!}</div>
                                </td>
                                <td>
                                    {{-- sdm --}}
                                    <div>{!! $px->parkir == 'Tidak Puas' ? 'parkir : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->security == 'Tidak Puas' ? 'security : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->dokter == 'Tidak Puas' ? 'dokter : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->perawat == 'Tidak Puas' ? 'perawat : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->radiologi == 'Tidak Puas' ? 'radiologi : Tidak Puas' : '' !!}</div>
                                    <div>{!! $px->laboratorium == 'Tidak Puas' ? 'laboratorium : Tidak Puas' : '' !!}</div>
                                </td>
                                <td>
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                        <span>@include('analisa.rajal.components.detail_px_rajal')</span>
                                        <span><a href="/analisa_pxrajal/hapus/{{ $px->id }}" type="button" class="btn btn-danger"> <i class="fas fa-trash-can"></i></a></span>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var table = $('#table1').DataTable({
            searchBuilder: true
        });
        table.searchBuilder.container().prependTo(table.table().container());
    });

</script>

@endsection
