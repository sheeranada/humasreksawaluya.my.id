<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PelayananResource;
use App\Http\Resources\PelayananCollection;

class PxRajalPelayananController extends Controller
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

        $pelayanan = $pxRajal
            ->pelayanan()
            ->search($search)
            ->latest()
            ->paginate();

        return new PelayananCollection($pelayanan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('create', Pelayanan::class);

        $validated = $request->validate([
            'kecepatan' => ['required', 'max:255', 'string'],
            'kemudahan' => ['required', 'max:255', 'string'],
            'pelayanan_yang_perlu_dibenahi' => [
                'required',
                'max:255',
                'string',
            ],
        ]);

        $pelayanan = $pxRajal->pelayanan()->create($validated);

        return new PelayananResource($pelayanan);
    }
}
