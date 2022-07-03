<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\SalaryGroup;
use DB;

class SalaryGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    public function index()
    {
        $salary_groups = SalaryGroup::orderBy('id_golongan', 'asc')->paginate(120);
        return view('salary_groups.index')->with('salary_groups', $salary_groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salary_group = SalaryGroup::all();
        return view('salary_groups.create')->with('salary_group', $salary_group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salaryGroup = new SalaryGroup();
        
            $this->validate($request, [
                'nama_golongan' => 'required',
                // 'persentase_kenaikan' => 'required',
                'gaji_pokok' => 'required',
            ]);

            // Create Data
            $salaryGroup = new SalaryGroup;
            // $salaryGroup->persentase_kenaikan = $request->input('persentase_kenaikan');
            $nama = SalaryGroup::where('nama_golongan', $request->input('nama_golongan'))->first();
            if($nama) {
                return redirect('/salary_groups')->with('success', 'Golongan Tidak Boleh Sama');
            } else {
                if($request->input('nama_golongan') == "A") {
                    if($request->input('gaji_pokok') < 3000000) {
                        return redirect('/salary_groups')->with('success', 'Golongan A Gaji Pokok Tidak Boleh Kurang Dari 3000000');
                    } else {
                        $salaryGroup->gaji_pokok = $request->input('gaji_pokok');
                        $salaryGroup->nama_golongan = $request->input('nama_golongan');
                    }
                } elseif($request->input('nama_golongan') == "B") {
                    if($request->input('gaji_pokok') < 2000000 || $request->input('gaji_pokok') > 3000000) {
                        return redirect('/salary_groups')->with('success', 'Golongan B Gaji Pokok Tidak Boleh Kurang Dari 2000000 Dan Tidak Boleh Lebih Dari 3000000');
                    } else {
                        $salaryGroup->gaji_pokok = $request->input('gaji_pokok');
                        $salaryGroup->nama_golongan = $request->input('nama_golongan');
                    }
                } elseif($request->input('nama_golongan') == "C") {
                    if($request->input('gaji_pokok') > 2000000) {
                        return redirect('/salary_groups')->with('success', 'Golongan C Gaji Pokok Tidak Boleh Lebih Dari 2000000');
                    } else {
                        $salaryGroup->gaji_pokok = $request->input('gaji_pokok');
                        $salaryGroup->nama_golongan = $request->input('nama_golongan');
                    }
                }

                $salaryGroup->save();
                return redirect('/salary_groups')->with('success', 'Data Berhasil Ditambahkan');
            }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_golongan)
    {
        $salary_group = SalaryGroup::find($id_golongan);
        // $salary_group = DB::table('salary_groups')->where('nama_golongan', $nama_golongan);
        return view('salary_groups.edit')->with('salary_group', $salary_group);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_golongan)
    {
        $this->validate($request, [
            'nama_golongan' => 'required',
            // 'persentase_kenaikan' => 'required',
            'gaji_pokok' => 'required',
        ]);

        $salaryGroup = SalaryGroup::find($id_golongan);
        $salaryGroup->gaji_pokok = $request->input('gaji_pokok');

        $salaryGroup->save();
        return redirect('/salary_groups')->with('success', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_golongan)
    {
        $salaryGroup = SalaryGroup::find($id_golongan);
        $salaryGroup->delete();
        return redirect('/salary_groups')->with('success', 'Data Berhasil Dihapus');
    }

}

