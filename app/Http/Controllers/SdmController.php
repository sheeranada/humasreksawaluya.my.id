<?php

namespace App\Http\Controllers;

use App\Models\Sdm;
use App\Models\PxRajal;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.sdm.index', compact('sdm', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Sdm::class);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.sdm.create', compact('pxRajal'));
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

        return redirect()
            ->route('sdm.edit', $sdm)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sdm $sdm
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sdm $sdm)
    {
        $this->authorize('view', $sdm);

        return view('app.sdm.show', compact('sdm'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sdm $sdm
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sdm $sdm)
    {
        $this->authorize('update', $sdm);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.sdm.edit', compact('sdm', 'pxRajal'));
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

        return redirect()
            ->route('sdm.edit', $sdm)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('sdm.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
