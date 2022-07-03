<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Employee;
use App\Models\SalaryGroup;
use App\Models\Score;
use App\Models\Salary;
use DB;

class EmployeesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('nama_lengkap', 'asc')->cursorPaginate(25);
        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $salary_group = SalaryGroup::all();
        // $salaryGroup = SalaryGroup::pluck('id_golongan', 'nama_golongan')->get();
        // $selectedID = 2;
        // return view('employees.create', compact('$salaryGroup', 'salaryGroup', '$salary_group'));

        // $salaryGroup = SalaryGroup::all()->pluck('nama_golongan','id_golongan')->get();
        // $selectedID = 2;

        $salaryGroup = SalaryGroup::all();
        // return $salaryGroup;
        
        return view('employees.create', compact('salaryGroup'));

        // return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'nullable',
            'agama' => 'required',
            'marital' => 'required',
            'ijazah_terakhir' => 'required',
            'status_kepegawaian' => 'required',
            'jabatan' => 'required',
            'tempat_bekerja' => 'required',
            'tgl_masuk_kerja' => 'required',
            'tgl_pengangkatan' => 'required',
            // 'golongan_terakhir' => 'required',
            'usia_pensiun' => 'required',
            'pas_foto' => 'image|nullable|max:1999',
            // 'id_golongan' => 'required',
        ]);

        //Handle File upload
        if($request->hasFile('pas_foto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('pas_foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('pas_foto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('pas_foto')->storeAs('public/pas_foto', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Data
        $employee = new Employee;
        $employee->nik = $request->input('nik');
        $employee->nama_lengkap = $request->input('nama_lengkap');
        $employee->jenis_kelamin = $request->input('jenis_kelamin');
        $employee->tempat_lahir = $request->input('tempat_lahir');
        $employee->tgl_lahir = $request->input('tgl_lahir');
        $employee->email = $request->input('email');
        $employee->agama = $request->input('agama');
        $employee->marital = $request->input('marital');
        $employee->ijazah_terakhir = $request->input('ijazah_terakhir');
        $employee->status_kepegawaian = $request->input('status_kepegawaian');
        $employee->jabatan = $request->input('jabatan');
        $employee->tempat_bekerja = $request->input('tempat_bekerja');
        $employee->tgl_masuk_kerja = $request->input('tgl_masuk_kerja');
        $employee->tgl_pengangkatan = $request->input('tgl_pengangkatan');
        // $employee->golongan_terakhir = $request->input('golongan_terakhir');
        $employee->usia_pensiun = $request->input('usia_pensiun');

        $employee->id_golongan = "";

        // $employee->lama_bekerja = $request->input('lama_bekerja');
            $tgl_masuk_kerja = $employee->tgl_masuk_kerja;
            $lama_bekerja = (date('Y') - date('Y',strtotime($tgl_masuk_kerja)));
            $employee->lama_bekerja = $lama_bekerja;

        // $employee->usia_sekarang = $request->input('usia_sekarang'); 
            $tgl_lahir = $employee->tgl_lahir;
            $usia_sekarang = (date('Y') - date('Y',strtotime($tgl_lahir)));
            $employee->usia_sekarang = $usia_sekarang;

        // $employee->perkiraan_pensiun = $request->input('perkiraan_pensiun');
            $usia_pensiun = $employee->usia_pensiun;
            $usia_sekarang = $employee->usia_sekarang;
            $perkiraan_pensiun = ($usia_pensiun - $usia_sekarang);
            $employee->perkiraan_pensiun = $perkiraan_pensiun;

        $employee->pas_foto = $fileNameToStore;

        $employee->save();
        return redirect('/employees')->with('success', 'Data Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $employee = Employee::find($nik);
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        $employee = Employee::find($nik);
        $salaryGroup = SalaryGroup::all();
        
        return view('employees.edit', compact('salaryGroup'))->with('employee', $employee);
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
            'nik' => 'required',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'email' => 'nullable',
            'agama' => 'required',
            'marital' => 'required',
            'ijazah_terakhir' => 'required',
            'status_kepegawaian' => 'required',
            'jabatan' => 'required',
            'tempat_bekerja' => 'required',
            'tgl_masuk_kerja' => 'required',
            'tgl_pengangkatan' => 'required',
            // 'golongan_terakhir' => 'required',
            'usia_pensiun' => 'required',
            'pas_foto' => 'image|nullable|max:1999',

            'id_golongan' => 'required',
        
        ]);

        //Handle File upload
        if($request->hasFile('pas_foto')){
            //Get filename with the extension
            $filenameWithExt = $request->file('pas_foto')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $extension = $request->file('pas_foto')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload Image
            $path = $request->file('pas_foto')->storeAs('public/pas_foto', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Update Data
        $employee = Employee::find($nik);
        $salary= Salary::find($nik);
        $score = Score::find($nik);
        $employee->nik = $request->input('nik');
        $salary->id_user = $request->input('nik');
        $score->nik = $request->input('nik');
        $employee->nama_lengkap = $request->input('nama_lengkap');
        $salary->nama_lengkap = $request->input('nama_lengkap');
        $score->nama_lengkap = $request->input('nama_lengkap');
        $employee->jenis_kelamin = $request->input('jenis_kelamin');
        $employee->tempat_lahir = $request->input('tempat_lahir');
        $employee->tgl_lahir = $request->input('tgl_lahir');
        $employee->email = $request->input('email');
        $employee->agama = $request->input('agama');
        $employee->marital = $request->input('marital');
        $employee->ijazah_terakhir = $request->input('ijazah_terakhir');
        $employee->status_kepegawaian = $request->input('status_kepegawaian');
        $employee->jabatan = $request->input('jabatan');
        $salary->jabatan = $request->input('jabatan');
        $employee->tempat_bekerja = $request->input('tempat_bekerja');
        $employee->tgl_masuk_kerja = $request->input('tgl_masuk_kerja');
        $employee->tgl_pengangkatan = $request->input('tgl_pengangkatan');
        // $employee->golongan_terakhir = $request->input('golongan_terakhir');
        $employee->usia_pensiun = $request->input('usia_pensiun');

        $employee->id_golongan = $request->input('id_golongan');
        
        if($request->hasFile('pas_foto')){
            $employee->pas_foto = $fileNameToStore;
        }

        // $employee->lama_bekerja = $request->input('lama_bekerja');
            $tgl_masuk_kerja = $employee->tgl_masuk_kerja;
            $lama_bekerja = (date('Y') - date('Y',strtotime($tgl_masuk_kerja)));
            $employee->lama_bekerja = $lama_bekerja;
        
        // $employee->usia_sekarang = $request->input('usia_sekarang');
            $tgl_lahir = $employee->tgl_lahir;
            $usia_sekarang = (date('Y') - date('Y',strtotime($tgl_lahir)));
            $employee->usia_sekarang = $usia_sekarang;

        // $employee->perkiraan_pensiun = $request->input('perkiraan_pensiun');
            $usia_pensiun = $employee->usia_pensiun;
            $usia_sekarang = $employee->usia_sekarang;
            $perkiraan_pensiun = ($usia_pensiun - $usia_sekarang);
            $employee->perkiraan_pensiun = $perkiraan_pensiun;

        $employee->save();
        $score->save();
        $salary->save();

        return redirect('/employees')->with('success', 'Data Berhasil Diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nik)
    {
        $employee = Employee::find($nik);
        $score = Score::find($nik);
        $salary = Salary::find($nik);
        $employee->delete();
        $score->delete();
        $salary->delete();
        return redirect('/employees')->with('success', 'Data Berhasil Dihapus');

        if($employee->pas_foto != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/pas_foto/'.$employee->pas_foto);
        }

    }

    // public function dropDownShow(Request $request)
    // {
    //     // $salary_group = SalaryGroup::all('nama_golongan')->get();
    //     // $salaryGroup = SalaryGroup::pluck('id_golongan', 'nama_golongan');
    //     // $selectedID = 2;
    //     // return view('employees.create', compact('$salaryGroup', 'salaryGroup', '$salary_group'));

    //     // $salary_group = SalaryGroup::all();
    //     // $salaryGroup = SalaryGroup::pluck('id_golongan', 'nama_golongan')->get();
    //     // $selectedID = 2;
    //     // return view('employees.create', compact('salaryGroup', '$salaryGroup'));

    //     $salaryGroup = SalaryGroup::pluck('nama_golongan','id_golongan')->get();
    //     $selectedID = 2;
    //     return view('employees.create', compact('salaryGroup', 'salary_group'));
    // }


    public function search(Request $request)
    {
        $search = $request->get('search');
        $employees = DB::table('employees')->where('nama_lengkap', 'like', '%'.$search.'%')->paginate(15);
        return view('employees.index', ['employees' => $employees]);
    }

    public function employees_sekre()
    {
        $employees = Employee::where('tempat_bekerja', '=', 'sekretariat')->paginate(25);
        return view('employees.index')->with('employees', $employees);
    }

    public function employees_tk()
    {
        $employees = Employee::where('tempat_bekerja', '=', 'tk')->paginate(25);
        return view('employees.index')->with('employees', $employees);
    }

    public function employees_sd()
    {
        $employees = Employee::where('tempat_bekerja', '=', 'sd')->paginate(25);
        return view('employees.index')->with('employees', $employees);
    }

    public function employees_smp()
    {
        $employees = Employee::where('tempat_bekerja', '=', 'smp')->paginate(25);
        return view('employees.index')->with('employees', $employees);
    }

    public function employees_sma()
    {
        $employees = Employee::where('tempat_bekerja', '=', 'sma')->paginate(25);
        return view('employees.index')->with('employees', $employees);
    }

}
