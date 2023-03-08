<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjetRequest;
use App\Models\Projet;
use App\Models\Student;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projet.index', ['projets' => Projet::orderBy('title', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::orderBy('name', 'asc')->orderBy('name', 'asc')->get();
        return view('projet.create', ['students' => $students]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetRequest $request)
    {
        $data = $request->validated();
        $projet = new Projet();
        $projet->fill($data);
        $projet->save();
        $projet->students()->attach($data['student']);
        return redirect()->route('projet.show', $projet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        return view('projet.show', ['projet' => $projet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet = Projet::where('id', $id)->firstOrFail();
        $students = Student::orderBy('name', 'asc')->get();

        return view('projet.edit', compact('projet', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetRequest $request, Projet $projet)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'link' => 'required',
            'student' => 'required'
        ]);
        $projet->fill($data);
        $projet->save();
        $projet->students()->sync($data['student']);
        return redirect()->route('projet.show', ['projet' => $projet]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet = Projet::where('id', $id)->firstOrFail();

        $projet->delete();

        return redirect()->route('projet.index');
    }
}
