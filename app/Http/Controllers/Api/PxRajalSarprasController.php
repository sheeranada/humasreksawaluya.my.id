<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SarprasResource;
use App\Http\Resources\SarprasCollection;

class PxRajalSarprasController extends Controller
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

        $sarpras = $pxRajal
            ->sarpras()
            ->search($search)
            ->latest()
            ->paginate();

        return new SarprasCollection($sarpras);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('create', Sarpras::class);

        $validated = $request->validate([
            'sarana' => ['required', 'max:255', 'string'],
            'prasarana' => ['required', 'max:255', 'string'],
            'fasilitas_lain' => ['required', 'max:255', 'string'],
        ]);

        $sarpras = $pxRajal->sarpras()->create($validated);

        return new SarprasResource($sarpras);
    }
}
