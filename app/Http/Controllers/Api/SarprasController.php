<?php

namespace App\Http\Controllers\Api;

use App\Models\Sarpras;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SarprasResource;
use App\Http\Resources\SarprasCollection;
use App\Http\Requests\SarprasStoreRequest;
use App\Http\Requests\SarprasUpdateRequest;

class SarprasController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Sarpras::class);

        $search = $request->get('search', '');

        $sarpras = Sarpras::search($search)
            ->latest()
            ->paginate();

        return new SarprasCollection($sarpras);
    }

    /**
     * @param \App\Http\Requests\SarprasStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SarprasStoreRequest $request)
    {
        $this->authorize('create', Sarpras::class);

        $validated = $request->validated();

        $sarpras = Sarpras::create($validated);

        return new SarprasResource($sarpras);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sarpras $sarpras
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sarpras $sarpras)
    {
        $this->authorize('view', $sarpras);

        return new SarprasResource($sarpras);
    }

    /**
     * @param \App\Http\Requests\SarprasUpdateRequest $request
     * @param \App\Models\Sarpras $sarpras
     * @return \Illuminate\Http\Response
     */
    public function update(SarprasUpdateRequest $request, Sarpras $sarpras)
    {
        $this->authorize('update', $sarpras);

        $validated = $request->validated();

        $sarpras->update($validated);

        return new SarprasResource($sarpras);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sarpras $sarpras
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sarpras $sarpras)
    {
        $this->authorize('delete', $sarpras);

        $sarpras->delete();

        return response()->noContent();
    }
}
