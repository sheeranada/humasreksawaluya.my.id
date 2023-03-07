<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FarmasiResource;
use App\Http\Resources\FarmasiCollection;

class PxRajalFarmasiController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('view', $pxRajal);

        $search = $request->get('search', '');

        $farmasi = $pxRajal
            ->farmasis()
            ->search($search)
            ->latest()
            ->paginate();

        return new FarmasiCollection($farmasi);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('create', Farmasi::class);

        $validated = $request->validate([
            'kecepatan' => ['required', 'max:255', 'string'],
            'sikap_petugas' => ['required', 'max:255', 'string'],
            'penjelasan_obat' => ['required', 'max:255', 'string'],
            'pelayanan_farmasi' => ['required', 'max:255', 'string'],
        ]);

        $farmasi = $pxRajal->farmasis()->create($validated);

        return new FarmasiResource($farmasi);
    }
}
