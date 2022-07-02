<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Analyst;
use DB;

class AnalystController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $analyst = Analyst::orderBy('id', 'asc')->paginate(120);
        return view('analyst.index')->with('analyst', $analyst);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('analyst.create');
        $analysts = Analyst::all();
        
        return view('analyst.create', compact('analysts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $analyst = new Analyst();
        
        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
            'cb' => 'required',
        ]);

        $analyst = new Analyst;
        $analyst->kriteria = $request->input('kriteria');
        $analyst->bobot = $request->input('bobot');
        $analyst->cb = $request->input('cb');

    $analyst->save();
    return redirect('/analyst')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $analyst = analyst::find($id);
        return view('analyst.edit')->with('analyst', $analyst);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
            'cb' => 'required',
        ]);

        $analyst = Analyst::find($id);
        $analyst->kriteria = $request->input('kriteria');
        $analyst->bobot = $request->input('bobot');
        $analyst->cb = $request->input('cb');

        $analyst->save();
        return redirect('/analyst')->with('success', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $analyst = Analyst::find($id);
        $analyst->delete();
        return redirect('/analyst')->with('success', 'Data Berhasil Dihapus');
    }
}
