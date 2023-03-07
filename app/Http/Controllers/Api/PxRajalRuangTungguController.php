<?php

namespace App\Http\Controllers\Api;

use App\Models\PxRajal;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RuangTungguResource;
use App\Http\Resources\RuangTungguCollection;

class PxRajalRuangTungguController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('view', $pxRajal);

        $search = $request->get('search', '');

        $ruangTunggu = $pxRajal
            ->ruangTunggu()
            ->search($search)
            ->latest()
            ->paginate();

        return new RuangTungguCollection($ruangTunggu);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PxRajal $pxRajal
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PxRajal $pxRajal)
    {
        $this->authorize('create', RuangTunggu::class);

        $validated = $request->validate([
            'kenyamanan' => ['required', 'max:255', 'string'],
            'kebersihan' => ['required', 'max:255', 'string'],
            'saran_kritik' => ['required', 'max:255', 'string'],
        ]);

        $ruangTunggu = $pxRajal->ruangTunggu()->create($validated);

        return new RuangTungguResource($ruangTunggu);
    }
}
