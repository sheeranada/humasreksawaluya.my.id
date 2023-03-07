<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Resources\SdmResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\SdmCollection;

class PxRajalSdmController extends Controller
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

        $sdm = $pxRajal
            ->sdm()
            ->search($search)
            ->latest()
            ->paginate();

        return new SdmCollection($sdm);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('create', Sdm::class);

        $validated = $request->validate([
            'parkir' => ['required', 'max:255', 'string'],
            'security' => ['required', 'max:255', 'string'],
            'dokter' => ['required', 'max:255', 'string'],
            'perawat' => ['required', 'max:255', 'string'],
            'radiologi' => ['required', 'max:255', 'string'],
            'laboratorium' => ['required', 'max:255', 'string'],
        ]);

        $sdm = $pxRajal->sdm()->create($validated);

        return new SdmResource($sdm);
    }
}
