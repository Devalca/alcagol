<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Score;
use App\Models\Employee;
use App\Models\SalaryGroup;
use App\Models\Analyst;
use DB;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $score = Score::orderBy('nik', 'asc')->paginate(120);
        $salary_groups = SalaryGroup::orderBy('id_golongan', 'asc')->paginate(120);
        $analyst = Analyst::all();
        return view('score.index', compact('analyst', 'salary_groups'))->with('score', $score);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $score = Score::orderBy('nik', 'asc')->paginate(120);
        $employees = Employee::all();
        return view('score.create', compact('employees'))->with('score', $score);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $score = new Score();
        // nama_lengkap == nik
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'k1' => 'required',
            'k2' => 'required',
            'k3' => 'required',
            'k4' => 'required',
            'k5' => 'required',
            'k6' => 'required',
        ]);

        $score = new Score;
        $cekScore = Score::find($request->input('nama_lengkap'));
        $nama = Employee::where('nik', $request->input('nama_lengkap'))->first();
        $score->nik = $request->input('nama_lengkap');
        $score->nama_lengkap = $nama->nama_lengkap;
        if($request->input('k1') < 10
            || $request->input('k2') < 10
            || $request->input('k3') < 10
            || $request->input('k4') < 10
            || $request->input('k5') < 10
            || $request->input('k6') < 10) {
            return redirect('/score')->with('error', 'Minimal 10 Poin');
        } elseif($request->input('k1') > 100 
            || $request->input('k2') > 100
            || $request->input('k3') > 100
            || $request->input('k4') > 100
            || $request->input('k5') > 100
            || $request->input('k6') > 100) {
            return redirect('/score')->with('error', 'Maximal 100 Poin');
        } else {
        $score->k1 = $request->input('k1');
        $score->k2 = $request->input('k2');
        $score->k3 = $request->input('k3');
        $score->k4 = $request->input('k4');
        $score->k5 = $request->input('k5');
        $score->k6 = $request->input('k6');

        $score->save();
        return redirect('/score')->with('success', 'Data Berhasil Ditambahkan');
        }
        
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
    public function edit($nik)
    {
        $score = Score::find($nik);
        return view('score.edit')->with('score', $score);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {
        $this->validate($request, [
            'k1' => 'required',
            'k3' => 'required',
            'k4' => 'required',
            'k5' => 'required',
            'k6' => 'required',
        ]);

        $score = Score::find($nik);
        if($request->input('k1') < 10
            || $request->input('k2') < 10
            || $request->input('k3') < 10
            || $request->input('k4') < 10
            || $request->input('k5') < 10
            || $request->input('k6') < 10) {
            return redirect('/score')->with('error', 'Minimal 10 Poin');
        } elseif($request->input('k1') > 100 
            || $request->input('k2') > 100
            || $request->input('k3') > 100
            || $request->input('k4') > 100
            || $request->input('k5') > 100
            || $request->input('k6') > 100) {
            return redirect('/score')->with('error', 'Maximal 100 Poin');
        } else {
        $score->k1 = $request->input('k1');
        $score->k2 = $request->input('k2');
        $score->k3 = $request->input('k3');
        $score->k4 = $request->input('k4');
        $score->k5 = $request->input('k5');
        $score->k6 = $request->input('k6');

        $score->save();
        return redirect('/score')->with('success', 'Data Berhasil Ditambahkan');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $score = Score::find($nik);
        $score->delete();
        return redirect('/score')->with('success', 'Data Berhasil Dihapus');
    }

    public function kon(Request $request, $nik)
    {
        // $score = Score::find($gol);

        $golongan = "";
        if($request->input('golongan') >= 0.8) {
            $golongan = "C";
        }
        $employee = Employee::find($nik);
        $nama = SalaryGroup::where('nama_golongan', $golongan)->first();
        // $kk = SalaryGroup::find($golongan);
        // $b = $salaryGroup->id_golongan;

        $employee->id_golongan = $nama->id_golongan;
        $employee->save();

        return redirect('/score')->with('success', 'Update Golongan Karyawan Berhasil');
    }
}
