<?php

namespace App\Http\Controllers;

use App\Models\Farmasi;
use App\Models\PxRajal;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.farmasi.index', compact('farmasi', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Farmasi::class);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.farmasi.create', compact('pxRajal'));
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

        return redirect()
            ->route('farmasi.edit', $farmasi)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farmasi $farmasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Farmasi $farmasi)
    {
        $this->authorize('view', $farmasi);

        return view('app.farmasi.show', compact('farmasi'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Farmasi $farmasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Farmasi $farmasi)
    {
        $this->authorize('update', $farmasi);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.farmasi.edit', compact('farmasi', 'pxRajal'));
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

        return redirect()
            ->route('farmasi.edit', $farmasi)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('farmasi.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
