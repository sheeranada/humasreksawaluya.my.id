<?php

namespace App\Http\Controllers;

use App\Models\Sarpras;
use App\Models\PxRajal;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.sarpras.index', compact('sarpras', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Sarpras::class);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.sarpras.create', compact('pxRajal'));
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

        return redirect()
            ->route('sarpras.edit', $sarpras)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sarpras $sarpras
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Sarpras $sarpras)
    {
        $this->authorize('view', $sarpras);

        return view('app.sarpras.show', compact('sarpras'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sarpras $sarpras
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sarpras $sarpras)
    {
        $this->authorize('update', $sarpras);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.sarpras.edit', compact('sarpras', 'pxRajal'));
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

        return redirect()
            ->route('sarpras.edit', $sarpras)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('sarpras.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
