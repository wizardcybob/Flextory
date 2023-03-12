<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetRequest;
use App\Models\Area;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Sheet;
use App\Models\State;
use App\Models\Teacher;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sheet.index', ['sheets' => Sheet::orderBy('title', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Sheet::class);
        $areas = Area::orderBy('name', 'asc')->get();
        $states = State::orderBy('name', 'asc')->get();
        $teachers = Teacher::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('sheet.create', ['areas' => $areas, 'teachers' => $teachers, 'categories' => $categories, 'states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetRequest $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable',
        'idea' => 'nullable',
        'state' => 'required',
        'area' => 'nullable',
        'category' => 'nullable',
        'teacher' => 'nullable',
    ]);
    // dd($data);
    $sheet = new Sheet();
    $sheet->fill($data);
    if (isset($data['area'])) {
        $sheet->area()->associate($data['area']);
    }
    $sheet->state()->associate($data['state']);
    if (isset($data['category'])) {
        $sheet->category()->associate($data['category']);
    }
    $sheet->save();
    if (isset($data['teacher'])) {
        $sheet->teachers()->attach($data['teacher']);
    }
    return redirect()->route('sheet.show', $sheet);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet)
    {
        return view('sheet.show', ['sheet' => $sheet]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = Area::orderBy('name', 'asc')->get();
        $states = State::orderBy('name', 'asc')->get();
        $teachers = Teacher::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $sheet = Sheet::where('id', $id)->firstOrFail();

        return view('sheet.edit', compact('sheet', 'areas', 'teachers', 'categories', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SheetRequest $request, Sheet $sheet)
    {
        $this->authorize('update', $sheet);
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable',
            'idea' => 'nullable',
            'state' => 'required',
            'area' => 'nullable',
            'category' => 'nullable',
            'teacher' => 'nullable',
        ]);
        // dd($data);
        $sheet->fill($data);
        $sheet->save();
        if (isset($data['teacher'])) {
            $sheet->teachers()->sync($data['teacher']);
            };
        if (isset($data['area'])) {
            $sheet->area()->associate($data['area'])->save();
        };
        if (isset($data['state'])) {
            $sheet->state()->associate($data['state'])->save();
        };
        if (isset($data['category'])) {
            $sheet->category()->associate($data['category'])->save();
        };
        return redirect()->route('sheet.show', ['sheet' => $sheet]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sheet = Sheet::where('id', $id)->firstOrFail();

        $sheet->delete();

        return redirect()->route('sheet.index');
    }
}
