<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrasiResource;
use App\Http\Resources\AdministrasiCollection;

class PxRajalAdministrasiController extends Controller
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

        $administrasi = $pxRajal
            ->administrasi()
            ->search($search)
            ->latest()
            ->paginate();

        return new AdministrasiCollection($administrasi);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('create', Administrasi::class);

        $validated = $request->validate([
            'pendaftaran' => ['required', 'max:255', 'string'],
            'kasir' => ['required', 'max:255', 'string'],
        ]);

        $administrasi = $pxRajal->administrasi()->create($validated);

        return new AdministrasiResource($administrasi);
    }
}
