<?php

namespace App\Http\Controllers;

use App\Http\Requests\SheetRequest;
use Illuminate\Http\Request;
use App\Models\Sheet;


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
        return view('sheet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SheetRequest $request)
    {
        $data = $request->validated();
        $sheet = new Sheet();
        $sheet->fill($data);
        $sheet->save();
        return redirect()->route('sheet.index', ['sheet', $sheet]);
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
        $sheet = Sheet::where('id', $id)->firstOrFail();

        return view('sheet.edit', compact('sheet'));
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
        $data = $request->validated();
        $sheet->fill($data);
        $sheet->save();
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
