<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeacherRequest;
use App\Models\Department;
use App\Models\Status;
use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Teacher::class);
        return view('teacher.index', ['teachers' => Teacher::orderBy('name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Teacher::class);
        $departments = Department::orderBy('name', 'asc')->get();
        $statuses = Status::orderBy('name', 'asc')->get();
        return view('teacher.create', ['departments' => $departments, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'permanent' => 'required',
            'department' => 'required', // Ajout du paramètre "department"
            'status' => 'required' // Ajout du paramètre "status"
        ]);
        $teacher = new Teacher();
        $teacher->fill($data);
        $teacher->department()->associate($data['department']);
        $teacher->status()->associate($data['status']);
        $teacher->save();
        return redirect()->route('teacher.index', ['teacher' => $teacher]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        $this->authorize('view', $teacher);
        return view('teacher.show', ['teacher' => $teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $departments = Department::orderBy('name', 'asc')->get();
        $statuses = Status::orderBy('name', 'asc')->get();
        $teacher = Teacher::where('id', $id)->firstOrFail();

        return view('teacher.edit', compact('teacher', 'departments', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, Teacher $teacher)
    {
        $this->authorize('update', $teacher);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'permanent' => 'required',
            'department_id' => 'required|exists:departments,id',
            'status_id' => 'required|exists:statuses,id'
        ]);
        $teacher->fill($data);
        $teacher->save();
        $teacher->department()->associate($data['department_id'])->save();
        $teacher->status()->associate($data['status_id'])->save();
        return redirect()->route('teacher.show', ['teacher' => $teacher]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::where('id', $id)->firstOrFail();

        $teacher->delete();

        return redirect()->route('teacher.index');
    }
}
