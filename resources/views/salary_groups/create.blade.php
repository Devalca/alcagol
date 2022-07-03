@extends('layouts.app')

@section('content')
    <h1><b>TAMBAH DATA</b></h1>
    <hr>
    {!! Form::open(['action' => 'SalaryGroupController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{--<div class="form-group">
            {{Form::label('nama_golongan', 'Nama Golongan')}}
            {{Form::text('nama_golongan', '', ['class' => 'form-control', 'placeholder' => 'Masukkan nama golongan'])}}
        </div>--}}
        <label>Nama Golongan</label><br>
            <select class="form-control" name="nama_golongan">
                <option selected="true" disabled="true">Pilih Nama Golongan</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
            </select>
        <br>
        <div class="form-group">
            {{Form::label('gaji_pokok', 'Gaji Pokok')}}
            {{Form::number('gaji_pokok', '', ['class' => 'form-control', 'placeholder' => 'Masukkan nominal gaji pokok'])}}
        </div>
        <hr>
        <div class="form-group">
            <a href="/salary_groups" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br><br>
    {!! Form::close() !!}
    
@endsection