<?php

namespace App\Http\Controllers;

use App\Models\Sdm;
use App\Models\Farmasi;
use App\Models\PxRajal;
use App\Models\Sarpras;
use App\Models\Pelayanan;
use App\Models\UpfHistory;
use App\Models\RuangTunggu;
use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Models\PasienPribadi;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class DataPasienController extends Controller
{
    public function tampilkan_rajal()
    {
        $datapxrajal = UpfHistory::orderby('tgl_jam','desc')
            ->join('pasien_pribadi', 'pasien_pribadi.id', '=', 'upf_history.id_pasien')
            ->where('inap_jalan','UGD/IGD')
            ->orWhere('inap_jalan','Rawat Jalan')
            ->take(12000)
            ->get();
        // return response()->json([
        //     'data' => $datapx
        // ]);
        return view('Rajal.index',compact(['datapxrajal']));
        // dd($datapxrajal);
    }
    public function survey_rajal($no_upf)
    {
        $no_upf = Crypt::decrypt($no_upf);
        $datapxrajal = UpfHistory::orderby('tgl_jam','desc')
            ->join('pasien_pribadi', 'pasien_pribadi.id', '=', 'upf_history.id_pasien')
            ->where('no_upf',$no_upf)
            ->get();
        // return response()->json([
        //     'data' => $datapxrajal
        // ]);
        return view('Rajal.form',compact(['datapxrajal']));
    }
    public function rajalsimpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_upf' => 'required|unique:px_rajal,no_upf',
        ]);

        if ($validator->fails()) {
            return redirect('/oops')
                        ->withErrors($validator)
                        ->withInput();
        }

        $pxrajal = new PxRajal();
        $pxrajal->no_upf = $request->no_upf;
        $pxrajal->no_rm = $request->no_rm;
        $pxrajal->nama_pasien = $request->nama_pasien;
        $pxrajal->klinik = $request->klinik;
        $pxrajal->penjamin = $request->penjamin;
        $pxrajal->no_penjamin = $request->no_penjamin;
        $pxrajal->tgl_daftar = $request->tgl_daftar;
        $pxrajal->kategori_pasien = $request->kategori_pasien;
        $pxrajal->no_hp = $request->no_hp;
        $pxrajal->id_card = $request->id_card;
        $pxrajal->id_number = $request->id_number;
        $pxrajal->save();

        $adm = new Administrasi();
        $adm->pendaftaran = $request->pendaftaran;
        $adm->kasir = $request->kasir;
        $adm->px_rajal_id = $pxrajal->id;
        $adm->save();

        $frm = new Farmasi();
        $frm->kecepatan = $request->kecepatan;
        $frm->sikap_petugas = $request->sikap_petugas;
        $frm->penjelasan_obat = $request->penjelasan_obat;
        $frm->pelayanan_farmasi = $request->pelayanan_farmasi;
        $frm->px_rajal_id = $pxrajal->id;
        $frm->save();

        $plyn = new Pelayanan();
        $plyn->kecepatan_pelayanan = $request->kecepatan_pelayanan;
        $plyn->kemudahan = $request->kemudahan;
        $plyn->pelayanan_yang_perlu_dibenahi = $request->pelayanan_yang_perlu_dibenahi;
        $plyn->px_rajal_id = $pxrajal->id;
        $plyn->save();

        $rt = new RuangTunggu();
        $rt->kenyamanan = $request->kenyamanan;
        $rt->kebersihan = $request->kebersihan;
        $rt->saran_kritik = $request->saran_kritik;
        $rt->px_rajal_id = $pxrajal->id;
        $rt->save();

        $srps = new Sarpras();
        $srps->sarana = $request->sarana;
        $srps->prasarana = $request->prasarana;
        $srps->fasilitas_lain = $request->fasilitas_lain;
        $srps->px_rajal_id = $pxrajal->id;
        $srps->save();

        $sdm = new Sdm();
        $sdm->px_rajal_id = $pxrajal->id;
        $sdm->parkir = $request->parkir;
        $sdm->security = $request->security;
        $sdm->dokter = $request->dokter;
        $sdm->perawat = $request->perawat;
        $sdm->radiologi = $request->radiologi;
        $sdm->laboratorium = $request->laboratorium;
        $sdm->save();

        return Redirect::to('https://rsreksawaluya.com');
        // dd($request);
    }
}
