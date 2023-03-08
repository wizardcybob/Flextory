<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Projet;
use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index', ['students' => Student::orderBy('name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projets = Projet::orderBy('title', 'asc')->orderBy('title', 'asc')->get();
        return view('student.create', ['projets' => $projets]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        $student = new Student();
        $student->fill($data);
        $student->save();
        $student->projets()->attach($data['projet']);
        return redirect()->route('student.show', $student);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id', $id)->firstOrFail();
        $projets = Projet::orderBy('title', 'asc')->get();

        return view('student.edit', compact('student', 'projets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'actif' => 'required',
            'projet' => 'required'
        ]);
        // dd($request);
        $student->fill($data);
        $student->save();
        $student->projets()->sync($data['projet']);
        return redirect()->route('student.show', ['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::where('id', $id)->firstOrFail();

        $student->delete();

        return redirect()->route('student.index');
    }
}
