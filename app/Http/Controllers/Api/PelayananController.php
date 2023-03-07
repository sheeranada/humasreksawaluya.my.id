<?php

namespace App\Http\Controllers\Api;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PelayananResource;
use App\Http\Resources\PelayananCollection;
use App\Http\Requests\PelayananStoreRequest;
use App\Http\Requests\PelayananUpdateRequest;

class PelayananController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Pelayanan::class);

        $search = $request->get('search', '');

        $pelayanan = Pelayanan::search($search)
            ->latest()
            ->paginate();

        return new PelayananCollection($pelayanan);
    }

    /**
     * @param \App\Http\Requests\PelayananStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PelayananStoreRequest $request)
    {
        $this->authorize('create', Pelayanan::class);

        $validated = $request->validated();

        $pelayanan = Pelayanan::create($validated);

        return new PelayananResource($pelayanan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pelayanan $pelayanan)
    {
        $this->authorize('view', $pelayanan);

        return new PelayananResource($pelayanan);
    }

    /**
     * @param \App\Http\Requests\PelayananUpdateRequest $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function update(
        PelayananUpdateRequest $request,
        Pelayanan $pelayanan
    ) {
        $this->authorize('update', $pelayanan);

        $validated = $request->validated();

        $pelayanan->update($validated);

        return new PelayananResource($pelayanan);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pelayanan $pelayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Pelayanan $pelayanan)
    {
        $this->authorize('delete', $pelayanan);

        $pelayanan->delete();

        return response()->noContent();
    }
}
