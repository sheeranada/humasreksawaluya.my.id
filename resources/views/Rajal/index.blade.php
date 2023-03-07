@extends('base.base1')
@section('judul','Data Rawat Jalan')
@section('konten')
@include('base.navbar')
<div class="container-fluid mt-5 mb-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h2 class="d-flex justify-content-center">Data Pasien Rawat Jalan</h2>
                </div>
                <div class="card-body">
                    <div class="table-responsive" style="width:100%">
                        <table class="table table-bordered table-responsive table-hover table-striped nowrap" id="table1">
                            <thead>
                                <tr>
                                    <th>TANGGAL DAFTAR</th>
                                    <th>NO RM</th>
                                    <th>NAMA PASIEN</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ID CARD</th>
                                    <th>ID NUMBER</th>
                                    <th>PENJAMIN</th>
                                    <th>NO PENJAMIN</th>
                                    <th>NO HP</th>
                                    <th>PILIHAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datapxrajal as $px)
                                <tr>
                                    <td>{{ Carbon\Carbon::parse($px->tgl_jam)->format('Y-m-d') }}</td>
                                    <td>{{ $px->id_pasien }}</td>
                                    <td>{{ $px->nama }}</td>
                                    <td>{{ $px->sex }}</td>
                                    <td>{{ $px->id_card }}</td>
                                    <td>{{ $px->id_number }}</td>
                                    <td>{{ $px->jenis }}</td>
                                    <td>-</td>
                                    <td>{{ $px->hp }}</td>
                                    <td>
                                        <a type="button" class="btn btn-success" href="@include('Rajal.components.form.wa')" target="_blank">
                                            <i class="fab fa-whatsapp"></i> Kirim Survey
                                        </a>
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
        var table = $('#table1').DataTable({
            searchBuilder: true
        });
        table.searchBuilder.container().prependTo(table.table().container());
    });

</script>
@endsection
