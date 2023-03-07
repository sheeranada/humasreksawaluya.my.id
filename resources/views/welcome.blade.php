@extends('base.base1')
@section('judul','Dashboard')
@section('konten')
<div class="container-fluid">
    <div class="row">
        <div class="col d-flex justify-content-end mt-2">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="d-inline-flex">
                    <i class="fas fa-arrow-right-from-bracket"></i>
                    <p>{{ __('Logout') }}</p>
                </div>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <h2>SELAMAT DATANG DI -LiDa.app</h2>
        </div>
        <hr>
    </div>
    <div class="row mt-2">
        <div class="col">
            <h3>APLIKASI RAWAT JALAN</h3>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <h5 class="card-header">User Account</h5>
                <div class="card-body">
                    <a href="/home" class="btn btn-primary"> <i class="fas fa-arrow-up-right-from-square"></i>Account</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">Rawat Jalan</h5>
                <div class="card-body">
                    <a href="/data_pasien_rajal" class="btn btn-primary"> <i class="fas fa-arrow-up-right-from-square"></i> Data Rajal</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Analisa Pasien</h5>
                <div class="card-body">
                    <a href="/analisa_pxrajal" class="btn btn-primary"> <i class="fas fa-arrow-up-right-from-square"></i> Analisa Pasien</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">Persentase Kepuasan Pasien</h5>
                <div class="card-body">
                    <a href="{{ route('laporan') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-up-right-from-square"></i> Laporan</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <h5 class="card-header">coming soon !!</h5>
                <div class="card-body">
                    <a href="/" class="btn btn-primary"> <i class="fas fa-arrow-up-right-from-square"></i> Sabar dolo</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <hr>
        </div>
    </div>
</div>
@endsection
