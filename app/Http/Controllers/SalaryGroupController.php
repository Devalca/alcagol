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
        return view('salary_groups.create');
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
            $salaryGroup->nama_golongan = $request->input('nama_golongan');
            // $salaryGroup->persentase_kenaikan = $request->input('persentase_kenaikan');
            $salaryGroup->gaji_pokok = $request->input('gaji_pokok');

            // $gaji_pokok_min = SalaryGroup::latest()->pluck('gaji_pokok')->first();
            // $gaji_pokok_const = SalaryGroup::oldest()->pluck('gaji_pokok')->first();
            // $persentase_kenaikan = $salaryGroup->persentase_kenaikan;
            // $id_golongan = $salaryGroup->id_golongan;
            // $gaji_pokok = 
            // ($gaji_pokok_min + ($gaji_pokok_const * (($persentase_kenaikan / 6) * ($id_golongan + 1)) / 100 ));
            // $salaryGroup->gaji_pokok = $gaji_pokok;
            
    
        // $basic_salary = ($id_salarygroup="1A1"->$basic_salary);
        // $percentage = $id_seconddigit->percentage;
        // $basic_salary_a = $basic_salary + ( $basic_salary * ( ( $percentage / 6) * 1) % );
        // $salaryGroup->basic_salary = $basic_salary_a;
        
        
        // //	Start Third Digit Case
        // $salaryGroupFirst = SalaryGroup::where('id_thirddigit' == 1)->first();
    
        // if ($salaryGroupFirst->exists()) {
        //     $salaryGroup->basic_salary = ($request->input('basic_salary') * 
        //     ($salaryGroupFirst->percentage * $salaryGroupFirst->id - 1)) + $request->input('basic_salary');
        // } else {
        //     $salaryGroup->basic_salary = $request->input('basic_salary');
        // }
        // //	End Third Digit Case
    
        $salaryGroup->save();
        return redirect('/salary_groups')->with('success', 'Data Berhasil Ditambahkan');
    
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

        // Create Data
        $salaryGroup = SalaryGroup::find($id_golongan);
        $salaryGroup->nama_golongan = $request->input('nama_golongan');
        // $salaryGroup->persentase_kenaikan = $request->input('persentase_kenaikan');
        $salaryGroup->gaji_pokok = $request->input('gaji_pokok');

        // $gaji_pokok_min = SalaryGroup::latest()->pluck('gaji_pokok')->first();
        //     $gaji_pokok_const = SalaryGroup::oldest()->pluck('gaji_pokok')->first();
        //     $persentase_kenaikan = $salaryGroup->persentase_kenaikan;
        //     $id_golongan = $salaryGroup->id_golongan;
        //     $gaji_pokok = 
        //     ($gaji_pokok_min + ($gaji_pokok_const * (($persentase_kenaikan / 6) * ($id_golongan + 1)) / 100 ));
        //     $salaryGroup->gaji_pokok = $gaji_pokok;

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

    // public function destroy_all()
    // {
    //     DELETE * FROM 'salary_groups';
    //         WHERE condition;
          
        

    //     return redirect('/salary_groups')->with('success', 'Data Berhasil Dihapus');
    // }

    // public function edit_presentase($id_golongan)
    // {
    //     $salary_group = DB::table('salary_groups')->where($id_golongan)->'1';
    //     // $salary_group = DB::table('salary_groups')->where('nama_golongan', $nama_golongan);
    //     return view('salary_groups.edit_presentase')->with('salary_group', $salary_group);
    // }

    // public function update_presentase(Request $request)
    // {
    //     $salaryGroup = new SalaryGroup();
        
    //         $this->validate($request, [
    //             'persentase_kenaikan' => 'required',
    //         ]);
        
    //         $salaryGroup->persentase_kenaikan = $request->input('persentase_kenaikan');
    
    //     $salaryGroup->save();
    //     return redirect('/salary_groups')->with('success', 'Data Berhasil Ditambahkan');
    
    // }


}

