<?php

namespace App\Http\Controllers;

use App\Http\Requests\AreaRequest;
use App\Models\Adearea;
use App\Models\Area;
use App\Models\Projet;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('area.index', ['areas' => Area::orderBy('name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Area::class);
        $adeareas = Adearea::orderBy('name', 'asc')->get();
        $projets = Projet::orderBy('title', 'asc')->orderBy('title', 'asc')->get();
        return view('area.create', ['projets' => $projets, 'adeareas' => $adeareas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'image' => 'nullable',
            'projet' => 'nullable',
            'adearea' => 'nullable'
        ]);
        // dd($data);
        $area = new Area();
        $area->fill($data);
        $area->adearea()->associate($data['adearea']);
        $area->save();
        if (isset($data['projet'])) {
            $area->projets()->attach($data['projet']);
        };
        return redirect()->route('area.show', $area);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function show(Area $area)
    {
        return view('area.show', ['area' => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adeareas = Adearea::orderBy('name', 'asc')->get();
        $area = Area::where('id', $id)->firstOrFail();
        $projets = Projet::orderBy('title', 'asc')->get();
        return view('area.edit', compact('area', 'projets', 'adeareas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, Area $area)
    {
        $this->authorize('update', $area);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'image' => 'nullable',
            'projet' => 'nullable',
            'adearea' => 'nullable'
        ]);
        // dd($request);
        $area->fill($data);
        $area->save();
        if (isset($data['adearea_id'])) {
        $area->adearea()->associate($data['adearea_id'])->save();
        };
        if (isset($data['projet'])) {
            $area->projets()->sync($data['projet']);
        };
        return redirect()->route('area.show', ['area' => $area]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Area  $area
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $area = Area::where('id', $id)->firstOrFail();

        $area->delete();

        return redirect()->route('area.index');
    }
}
