<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PxRajalResource;
use App\Http\Resources\PxRajalCollection;
use App\Http\Requests\PxRajalStoreRequest;
use App\Http\Requests\PxRajalUpdateRequest;

class PxRajalController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', PxRajal::class);

        $search = $request->get('search', '');

        $pxRajal = PxRajal::search($search)
            ->latest()
            ->paginate();

        return new PxRajalCollection($pxRajal);
    }

    /**
     * @param \App\Http\Requests\PxRajalStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PxRajalStoreRequest $request)
    {
        $this->authorize('create', PxRajal::class);

        $validated = $request->validated();

        $pxRajal = PxRajal::create($validated);

        return new PxRajalResource($pxRajal);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('view', $pxRajal);

        return new PxRajalResource($pxRajal);
    }

    /**
     * @param \App\Http\Requests\PxRajalUpdateRequest $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function update(PxRajalUpdateRequest $request, PxRajal $pxRajal)
    {
        $this->authorize('update', $pxRajal);

        $validated = $request->validated();

        $pxRajal->update($validated);

        return new PxRajalResource($pxRajal);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('delete', $pxRajal);

        $pxRajal->delete();

        return response()->noContent();
    }
}
