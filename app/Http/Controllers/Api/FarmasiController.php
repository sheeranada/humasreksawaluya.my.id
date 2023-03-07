<?php

namespace App\Http\Controllers\Api;

use App\Models\Farmasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FarmasiResource;
use App\Http\Resources\FarmasiCollection;
use App\Http\Requests\FarmasiStoreRequest;
use App\Http\Requests\FarmasiUpdateRequest;

class FarmasiController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Farmasi::class);

        $search = $request->get('search', '');

        $farmasi = Farmasi::search($search)
            ->latest()
            ->paginate();

        return new FarmasiCollection($farmasi);
    }

    /**
     * @param \App\Http\Requests\FarmasiStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(FarmasiStoreRequest $request)
    {
        $this->authorize('create', Farmasi::class);

        $validated = $request->validated();

        $farmasi = Farmasi::create($validated);

        return new FarmasiResource($farmasi);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farmasi $farmasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Farmasi $farmasi)
    {
        $this->authorize('view', $farmasi);

        return new FarmasiResource($farmasi);
    }

    /**
     * @param \App\Http\Requests\FarmasiUpdateRequest $request
     * @param \App\Models\Farmasi $farmasi
     * @return \Illuminate\Http\Response
     */
    public function update(FarmasiUpdateRequest $request, Farmasi $farmasi)
    {
        $this->authorize('update', $farmasi);

        $validated = $request->validated();

        $farmasi->update($validated);

        return new FarmasiResource($farmasi);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farmasi $farmasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Farmasi $farmasi)
    {
        $this->authorize('delete', $farmasi);

        $farmasi->delete();

        return response()->noContent();
    }
}
