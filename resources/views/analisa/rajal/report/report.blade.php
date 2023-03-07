@extends('base.base2')
@section('judul','Persentase Kepuasan')
@include('base.navbar')
@section('konten')
<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-flex justify-content-center">CUSTOMER FEEDBACK PESERTA RAWAT JALAN RS REKSA WALUYA</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped" id="laporan">
                            <thead>
                                <tr>
                                    <th>TANGGAL</th>
                                    <th>NO BPJS</th>
                                    <th>NAMA PASIEN</th>
                                    <th>NIK</th>
                                    <th>NO HP</th>
                                    <th>KLINIK</th>
                                    <th>KEPUASAN (%)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($px_rajal as $px)
                                <tr>
                                    <td>{{ $px->tgl_daftar }}</td>
                                    <td>{{ $px->no_penjamin }}</td>
                                    <td>{{ $px->nama_pasien }}</td>
                                    <td>{{ $px->id_number }}</td>
                                    <td>{{ $px->no_hp }}</td>
                                    <td>{{ $px->klinik }}</td>
                                    <td>
                                        @include('analisa.rajal.report.components.count') %
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
</div>

<script>
    $(document).ready(function() {
    $('#laporan').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
@endsection
