<?php

namespace App\Http\Controllers;

use App\Models\PxRajal;
use Illuminate\Http\Request;
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
            ->paginate(5)
            ->withQueryString();

        return view('app.px_rajal.index', compact('pxRajal', 'search'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->authorize('create', PxRajal::class);

        return view('app.px_rajal.create');
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

        return redirect()
            ->route('px-rajal.edit', $pxRajal)
            ->withSuccess(__('crud.common.created'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('view', $pxRajal);

        return view('app.px_rajal.show', compact('pxRajal'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('update', $pxRajal);

        return view('app.px_rajal.edit', compact('pxRajal'));
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

        return redirect()
            ->route('px-rajal.edit', $pxRajal)
            ->withSuccess(__('crud.common.saved'));
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

        return redirect()
            ->route('px-rajal.index')
            ->withSuccess(__('crud.common.removed'));
    }
}
