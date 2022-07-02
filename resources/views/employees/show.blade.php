@extends('layouts.app')

@section('content')
    <h1><b>DATA KARYAWAN</b></h1>
    <hr>
    <a href="/employees" class="btn btn-outline-dark" 
    style="height:40px;width:100px;margin:0pt 15pt 5pt 0pt;font-size:12pt">Kembali</a>
    
    <img class="mx-auto d-block" style="height:350px;border:3px solid;
    border-radius:10px" src="/storage/pas_foto/{{$employee->pas_foto}}">

    <table class="table" style="margin:10px 0px;font-size:12pt">
        <thead class="thead-dark">
            <tr>
                <th scope="row" width='23%'>NIK</th>
                <td width='27%'>{{$employee->nik}}</td>
                <th scope="row" width='23%'>NAMA LENGKAP</th>
                <td width='27%'>{{$employee->nama_lengkap}}</td>
            </tr>
            <tr>
                <th scope="row">JENIS KELAMIN</th>
                <td>{{$employee->jenis_kelamin}}</td>
                <th scope="row">TEMPAT LAHIR</th>
                <td>{{$employee->tempat_lahir}}</td>
            </tr>
            <tr>
                <th scope="row">TANGGAL LAHIR</th>
                <td>{{$employee->tgl_lahir}}</td>
                <th scope="row">EMAIL</th>
                <td>{{$employee->email}}</td>
            </tr>
            <tr>
                <th scope="row">AGAMA</th>
                <td>{{$employee->agama}}</td>
                <th scope="row">MARITAL</th>
                <td>{{$employee->marital}}</td>
            </tr>
            <tr>
                <th scope="row">IJAZAH TERAKHIR</th>
                <td>{{$employee->ijazah_terakhir}}</td>
                <th scope="row">STATUS KEPEGAWAIAN</th>
                <td>{{$employee->status_kepegawaian}}</td>
            </tr>
            <tr>
                <th scope="row">JABATAN</th>
                <td>{{$employee->jabatan}}</td>
                <th scope="row">TEMPAT BEKERJA</th>
                <td>{{$employee->tempat_bekerja}}</td>
            </tr>
            <tr>
                <th scope="row">TANGGAL MASUK KERJA</th>
                <td>{{$employee->tgl_masuk_kerja}}</td>
                <th scope="row">TANGGAL PENGANGKATAN</th>
                <td>{{$employee->tgl_pengangkatan}}</td>
            </tr>
            <tr>
                <th scope="row">GOLONGAN TERAKHIR</th>
                <td>{{$employee->salary_groups->nama_golongan}}</td>
                <th scope="row">LAMA BEKERJA</th>
                <td>{{$employee->lama_bekerja}} tahun</td>
            </tr>
            <tr>
                <th scope="row">USIA PENSIUN</th>
                <td>{{$employee->usia_pensiun}} tahun</td>
                <th scope="row">USIA SEKARANG</th>
                <td>{{$employee->usia_sekarang}} tahun</td>
            </tr>
            <tr>
                <th scope="row">PERKIRAAN PENSIUN</th>
                <td>{{$employee->perkiraan_pensiun}} tahun</td>
            </tr>
        </thead>
    </table>
    <table class="table" style="margin:10px 0px;font-size:12pt">
    <thead>
        <tr>
            <th scope="row" width='50%'><center><a href="/employees/{{$employee->nik}}/edit" 
                class="btn btn-primary" style="height:48px;width:200pt;margin:5pt 0pt 5pt 0pt;font-size:16pt">
                Edit</a></center></th>
            <th scope="row" width='50%'><center>
                {!!Form::open(['action' => ['EmployeesController@destroy', $employee->nik], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                    'style' => "height:48px;width:200pt;margin:5pt 0pt 5pt 0pt;font-size:16pt"])}}
                {!!Form::close()!!}</center>
            </th>
        </tr>
    </thead>
    </table>
    <br>
@endsection