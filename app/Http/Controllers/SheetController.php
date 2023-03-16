<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetRequest;
use App\Models\Area;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Sheet;
use App\Models\State;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheets = Sheet::orderBy('id', 'asc')->get();
        $categories = Category::all();
        $states = State::all();

        return view('sheet.index', ['sheets' => $sheets, 'categories' => $categories, 'states' => $states]);
    }

    public function dateasc()
    {
        $sheets = Sheet::orderBy('created_at', 'asc')->get();
        $categories = Category::all();
        $states = State::all();

        return view('sheet.index', ['sheets' => $sheets, 'categories' => $categories, 'states' => $states]);
    }

    public function datedesc()
    {
        $sheets = Sheet::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $states = State::all();

        return view('sheet.index', ['sheets' => $sheets, 'categories' => $categories, 'states' => $states]);
    }

    public function archive()
    {
        $sheets = Sheet::orderBy('title', 'asc')->onlyTrashed()->get();
        $categories = Category::all();
        $states = State::all();

        return view('sheet.archive', ['sheets' => $sheets, 'categories' => $categories, 'states' => $states]);
    }

    public function searchArchive(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $states = $request->input('states');

        $sheets = Sheet::when($category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($query, function ($query, $searchTerm) {
                return $query->where('title', 'LIKE', "%{$searchTerm}%");
            })
            ->when($states, function ($query, $selectedStates) {
                return $query->whereIn('state_id', $selectedStates);
            })
            ->get();

        $categories = Category::all();
        $states = State::all();


        return view('sheet.archive', ['sheets' => $sheets, 'categories' => $categories, 'states' => $states]);
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $states = $request->input('states');

        $sheets = Sheet::when($category, function ($query, $category) {
                return $query->where('category_id', $category);
            })
            ->when($query, function ($query, $searchTerm) {
                return $query->where('title', 'LIKE', "%{$searchTerm}%");
            })
            ->when($states, function ($query, $selectedStates) {
                return $query->whereIn('state_id', $selectedStates);
            })
            ->get();

        $categories = Category::all();
        $states = State::all();

        return view('sheet.index', ['sheets' => $sheets, 'categories' => $categories, 'states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Sheet::class);
        $images = Image::all();
        $areas = Area::orderBy('name', 'asc')->get();
        $states = State::orderBy('name', 'asc')->get();
        $teachers = Teacher::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        $creator = Auth::user()->name;
        return view('sheet.create', ['areas' => $areas, 'teachers' => $teachers, 'categories' => $categories, 'states' => $states, 'creator' => $creator, 'images' => $images]);
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
        'title' => 'required|string|max:191',
        'description' => 'nullable',
        'idea' => 'nullable',
        'state' => 'required',
        'area' => 'nullable',
        'category' => 'nullable',
        'teacher' => 'nullable',
        'image' => 'nullable',
        'creator' => 'nullable'

    ]);
    $data['creator'] = auth()->user()->name;
    $sheet = new Sheet();
    // dd($data['creator']);
    $sheet->fill($data);
    if (isset($data['student'])) {
        $sheet->image()->associate($data['image'])->save();
        };
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
        $images = Image::all();
        $areas = Area::orderBy('name', 'asc')->get();
        $states = State::orderBy('name', 'asc')->get();
        $teachers = Teacher::orderBy('name', 'asc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $sheet = Sheet::where('id', $id)->firstOrFail();

        $creator = Auth::user()->name;

        return view('sheet.edit', compact('sheet', 'areas', 'teachers', 'categories', 'states', 'creator', 'images'));
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
            'creator' => 'nullable',
            'image' => 'nullable'
        ]);
        $data['creator'] = auth()->user()->name;
        // dd($data);
        $sheet->fill($data);
        $sheet->save();
        if (isset($data['image'])) {
            $sheet->image()->associate($data['image'])->save();
            };
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

        return redirect()->route('sheet.archive');
    }

    public function forcedelete($id)
    {
        Sheet::where('id', $id)->forceDelete();
        return redirect()->route('sheet.archive');
    }

    public function restore($id)
    {
        Sheet::withTrashed()->find($id)->restore();

        return redirect()->route('sheet.archive');
    }
}
