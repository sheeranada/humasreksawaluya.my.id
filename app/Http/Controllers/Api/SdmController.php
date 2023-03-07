<?php

namespace App\Http\Controllers\Api;

use App\Models\Sdm;
use Illuminate\Http\Request;
use App\Http\Resources\SdmResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\SdmCollection;
use App\Http\Requests\SdmStoreRequest;
use App\Http\Requests\SdmUpdateRequest;

class SdmController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', Sdm::class);

        $search = $request->get('search', '');

        $sdm = Sdm::search($search)
            ->latest()
            ->paginate();

        return new SdmCollection($sdm);
    }

    /**
     * @param \App\Http\Requests\SdmStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SdmStoreRequest $request)
    {
        $this->authorize('create', Sdm::class);

        $validated = $request->validated();

        $sdm = Sdm::create($validated);

        return new SdmResource($sdm);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sdm $sdm
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sdm $sdm)
    {
        $this->authorize('view', $sdm);

        return new SdmResource($sdm);
    }

    /**
     * @param \App\Http\Requests\SdmUpdateRequest $request
     * @param \App\Models\Sdm $sdm
     * @return \Illuminate\Http\Response
     */
    public function update(SdmUpdateRequest $request, Sdm $sdm)
    {
        $this->authorize('update', $sdm);

        $validated = $request->validated();

        $sdm->update($validated);

        return new SdmResource($sdm);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sdm $sdm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sdm $sdm)
    {
        $this->authorize('delete', $sdm);

        $sdm->delete();

        return response()->noContent();
    }
}
