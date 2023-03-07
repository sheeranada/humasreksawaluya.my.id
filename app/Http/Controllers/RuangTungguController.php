<?php

namespace App\Http\Controllers;

use App\Models\PxRajal;
use App\Models\RuangTunggu;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.ruang_tunggu.index', compact('ruangTunggu', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', RuangTunggu::class);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.ruang_tunggu.create', compact('pxRajal'));
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

        return redirect()
            ->route('ruang-tunggu.edit', $ruangTunggu)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RuangTunggu $ruangTunggu
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, RuangTunggu $ruangTunggu)
    {
        $this->authorize('view', $ruangTunggu);

        return view('app.ruang_tunggu.show', compact('ruangTunggu'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RuangTunggu $ruangTunggu
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, RuangTunggu $ruangTunggu)
    {
        $this->authorize('update', $ruangTunggu);

        $pxRajal = PxRajal::pluck('nama_pasien', 'id');

        return view('app.ruang_tunggu.edit', compact('ruangTunggu', 'pxRajal'));
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

        return redirect()
            ->route('ruang-tunggu.edit', $ruangTunggu)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('ruang-tunggu.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
