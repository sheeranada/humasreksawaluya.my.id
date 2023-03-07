<?php

namespace App\Http\Controllers\Api;

use App\Models\RuangTunggu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RuangTungguResource;
use App\Http\Resources\RuangTungguCollection;
use App\Http\Requests\RuangTungguStoreRequest;
use App\Http\Requests\RuangTungguUpdateRequest;

class RuangTungguController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->authorize('view-any', RuangTunggu::class);

        $search = $request->get('search', '');

        $ruangTunggu = RuangTunggu::search($search)
            ->latest()
            ->paginate();

        return new RuangTungguCollection($ruangTunggu);
    }

    /**
     * @param \App\Http\Requests\RuangTungguStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangTungguStoreRequest $request)
    {
        $this->authorize('create', RuangTunggu::class);

        $validated = $request->validated();

        $ruangTunggu = RuangTunggu::create($validated);

        return new RuangTungguResource($ruangTunggu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RuangTunggu $ruangTunggu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RuangTunggu $ruangTunggu)
    {
        $this->authorize('view', $ruangTunggu);

        return new RuangTungguResource($ruangTunggu);
    }

    /**
     * @param \App\Http\Requests\RuangTungguUpdateRequest $request
     * @param \App\Models\RuangTunggu $ruangTunggu
     * @return \Illuminate\Http\Response
     */
    public function update(
        RuangTungguUpdateRequest $request,
        RuangTunggu $ruangTunggu
    ) {
        $this->authorize('update', $ruangTunggu);

        $validated = $request->validated();

        $ruangTunggu->update($validated);

        return new RuangTungguResource($ruangTunggu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RuangTunggu $ruangTunggu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, RuangTunggu $ruangTunggu)
    {
        $this->authorize('delete', $ruangTunggu);

        $ruangTunggu->delete();

        return response()->noContent();
    }
}
