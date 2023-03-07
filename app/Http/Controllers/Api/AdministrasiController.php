<?php

namespace App\Http\Controllers\Api;

use App\Models\Administrasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\AdministrasiResource;
use App\Http\Resources\AdministrasiCollection;
use App\Http\Requests\AdministrasiStoreRequest;
use App\Http\Requests\AdministrasiUpdateRequest;

class AdministrasiController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Administrasi::class);

        $search = $request->get('search', '');

        $administrasi = Administrasi::search($search)
            ->latest()
            ->paginate();

        return new AdministrasiCollection($administrasi);
    }

    /**
     * @param \App\Http\Requests\AdministrasiStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministrasiStoreRequest $request)
    {
        $this->authorize('create', Administrasi::class);

        $validated = $request->validated();

        $administrasi = Administrasi::create($validated);

        return new AdministrasiResource($administrasi);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Administrasi $administrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Administrasi $administrasi)
    {
        $this->authorize('view', $administrasi);

        return new AdministrasiResource($administrasi);
    }

    /**
     * @param \App\Http\Requests\AdministrasiUpdateRequest $request
     * @param \App\Models\Administrasi $administrasi
     * @return \Illuminate\Http\Response
     */
    public function update(
        AdministrasiUpdateRequest $request,
        Administrasi $administrasi
    ) {
        $this->authorize('update', $administrasi);

        $validated = $request->validated();

        $administrasi->update($validated);

        return new AdministrasiResource($administrasi);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Administrasi $administrasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Administrasi $administrasi)
    {
        $this->authorize('delete', $administrasi);

        $administrasi->delete();

        return response()->noContent();
    }
}
