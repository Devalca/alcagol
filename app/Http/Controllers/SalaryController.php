<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Salary;
use App\Models\Analyst;
use App\Models\Employee;
use App\Models\SalaryGroup;
use DB;

class SalaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salary = Salary::orderBy('id_user', 'asc')->paginate(120);
        $employees = Employee::all();
        return view('salary.index',compact('employees'))->with('salary', $salary);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salary = Salary::orderBy('id_user', 'asc')->paginate(120);
        $employees = Employee::all();
        $analysts = Analyst::all();
        return view('salary.create', compact('employees', 'analysts'))->with('salary', $salary);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary = new Salary();
        
        $this->validate($request, [
            'nama_lengkap' => 'required',
            'lembur' => 'required',
            't_istri' => 'required',
            't_anak' => 'required',
        ]);

        $salary = new Salary;
        $nullAbsen = 0;
        $nullCuti = 0;
        $nama = Employee::where('nik', $request->input('nama_lengkap'))->first();
        if($request->input('absen') == null) {
            $salary->absen = 0;
            $nullAbsen = 0;
        } else {
            $salary->absen = $request->input('absen');
            $nullAbsen = $request->input('absen');
        }
        if($request->input('cuti') == null) {
            $salary->cuti = 0;
            $nullCuti = 0;
        } else {
            $salary->cuti = $request->input('cuti');
            $nullCuti = $request->input('cuti');
        }
        $salary->id_user = $request->input('nama_lengkap');
        if ($nama->exists()) {
            $salary->nama_lengkap = $nama->nama_lengkap;
            $salary->jabatan = $nama->jabatan;
            $gajiPokok = SalaryGroup::where('id_golongan', $nama->id_golongan)->first();
            $salary->gaji_pokok = $gajiPokok->gaji_pokok;
        }
        $salary->lembur = $request->input('lembur');
        $salary->t_istri = $request->input('t_istri');
        $salary->t_anak = $request->input('t_anak');
        $salary->total = $gajiPokok->gaji_pokok + $request->input('lembur') + $request->input('t_istri') + $request->input('t_anak') + $nullAbsen + $nullCuti;

    $salary->save();
    return redirect('/salary')->with('success', 'Data Berhasil Ditambahkan');
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
    public function edit($id_user)
    {
        $salary = Salary::find($id_user);
        return view('salary.edit')->with('salary', $salary);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        $this->validate($request, [
            'lembur' => 'required',
            't_istri' => 'required',
            't_anak' => 'required',
        ]);

        $salary = Salary::find($id_user);
        $nullAbsen = 0;
        $nullCuti = 0;
        if($request->input('absen') == null) {
            $salary->absen = 0;
            $nullAbsen = 0;
        } else {
            $salary->absen = $request->input('absen');
            $nullAbsen = $request->input('absen');
        }
        if($request->input('cuti') == null) {
            $salary->cuti = 0;
            $nullCuti = 0;
        } else {
            $salary->cuti = $request->input('cuti');
            $nullCuti = $request->input('cuti');
        }
        $salary->lembur = $request->input('lembur');
        $salary->t_istri = $request->input('t_istri');
        $salary->t_anak = $request->input('t_anak');
        $salary->total = $salary->gaji_pokok + $request->input('lembur') + $request->input('t_istri') + $request->input('t_anak') + $nullAbsen + $nullCuti;

        $salary->save();
        return redirect('/salary')->with('success', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        $salary = Salary::find($id_user);
        $salary->delete();
        return redirect('/salary')->with('success', 'Data Berhasil Dihapus');
    }
}
