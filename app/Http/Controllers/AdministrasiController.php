<?php

namespace App\Http\Controllers;

use App\Models\PxRajal;
use App\Models\Administrasi;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view(
            'app.administrasi.index',
            compact('administrasi', 'search')
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', Administrasi::class);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.administrasi.create', compact('pxRajal'));
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

        return redirect()
            ->route('administrasi.edit', $administrasi)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Administrasi $administrasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Administrasi $administrasi)
    {
        $this->authorize('view', $administrasi);

        return view('app.administrasi.show', compact('administrasi'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Administrasi $administrasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Administrasi $administrasi)
    {
        $this->authorize('update', $administrasi);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view(
            'app.administrasi.edit',
            compact('administrasi', 'pxRajal')
        );
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

        return redirect()
            ->route('administrasi.edit', $administrasi)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('administrasi.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
