<?php

namespace App\Http\Controllers;

use App\Models\Adearea;
use Illuminate\Http\Request;

class AdeareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('adearea.index', ['adeareas' => Adearea::orderBy('name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Adearea::class);
        $adeareas = Adearea::orderBy('name', 'asc')->orderBy('name', 'asc')->get();
        return view('adearea.create', ['adeareas' => $adeareas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'image' => 'nullable', // Ajout du paramètre "department"
        ]);
        $adearea = new Adearea();
        $adearea->fill($data);
        $adearea->save();
        return redirect()->route('adearea.index', ['adearea' => $adearea]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adearea  $adearea
     * @return \Illuminate\Http\Response
     */
    public function show(Adearea $adearea)
    {
        $areas = $adearea->areas()->orderBy('name', 'asc')->get();
        return view('area.index', ['areas' => $areas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adearea  $adearea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adearea = Adearea::where('id', $id)->firstOrFail();

        return view('adearea.edit', compact('adearea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adearea  $adearea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adearea $adearea)
    {
        $this->authorize('update', $adearea);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'image' => 'nullable', // Ajout du paramètre "department"
        ]);
        $adearea->fill($data);
        $adearea->save();
        return redirect()->route('adearea.show', ['adearea' => $adearea]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adearea  $adearea
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $adearea = Adearea::where('id', $id)->firstOrFail();

        $adearea->delete();

        return redirect()->route('adearea.index');
    }
}
