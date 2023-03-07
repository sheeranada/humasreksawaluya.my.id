<?php

namespace App\Http\Controllers;

use App\Models\Administrasi;
use App\Models\PxRajal;
use App\Models\Farmasi;
use App\Models\Pelayanan;
use App\Models\RuangTunggu;
use App\Models\Sarpras;
use App\Models\Sdm;
use Illuminate\Http\Request;

class AnalisaPxrajalController extends Controller
{
    public function index()
    {
        $px_rajal = PxRajal::join('farmasi', 'px_rajal.id', '=', 'farmasi.px_rajal_id')
            ->join('administrasi', 'px_rajal.id', '=', 'administrasi.px_rajal_id')
            ->join('pelayanan', 'px_rajal.id', '=', 'pelayanan.px_rajal_id')
            ->join('ruang_tunggu', 'px_rajal.id', '=', 'ruang_tunggu.px_rajal_id')
            ->join('sarpras', 'px_rajal.id', '=', 'sarpras.px_rajal_id')
            ->join('sdm', 'px_rajal.id', '=', 'sdm.px_rajal_id')
            ->get(['px_rajal.*',
                    'kecepatan','sikap_petugas','penjelasan_obat','pelayanan_farmasi',
                    'pendaftaran','kasir',
                    'kecepatan_pelayanan','kemudahan','pelayanan_yang_perlu_dibenahi',
                    'kenyamanan','kebersihan','saran_kritik',
                    'sarana','prasarana','fasilitas_lain',
                    'parkir','security','dokter','perawat','radiologi','laboratorium'
                ]);

        return view('analisa.rajal.index',compact(['px_rajal']));
        // dd($datapx);
    }
    public function hapus($id)
    {
        $px_rajal = PxRajal::findorfail($id);
        $px_rajal->delete();
        return redirect()->back();
    }
    public function laporan()
    {
        $px_rajal = PxRajal::orderby('tgl_daftar','desc')
            ->join('farmasi', 'px_rajal.id', '=', 'farmasi.px_rajal_id')
            ->join('administrasi', 'px_rajal.id', '=', 'administrasi.px_rajal_id')
            ->join('pelayanan', 'px_rajal.id', '=', 'pelayanan.px_rajal_id')
            ->join('ruang_tunggu', 'px_rajal.id', '=', 'ruang_tunggu.px_rajal_id')
            ->join('sarpras', 'px_rajal.id', '=', 'sarpras.px_rajal_id')
            ->join('sdm', 'px_rajal.id', '=', 'sdm.px_rajal_id')
            ->where('penjamin','BPJS KESEHATAN')
            ->take(12000)
            ->get();
        return view('analisa.rajal.report.report',compact(['px_rajal']));
    }
}
