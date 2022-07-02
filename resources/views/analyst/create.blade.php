@extends('layouts.app')

@section('content')
    <h1><b>TAMBAH DATA</b></h1>
    <hr>
    {!! Form::open(['action' => 'AnalystController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('kriteria', 'Kriteria')}}
            {{Form::text('kriteria', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Kriteria'])}}
        </div>
        <div class="form-group">
            {{Form::label('bobot', 'Bobot')}}
            {{Form::text('bobot', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Bobot'])}}
        </div>
        <label>Cost / Benefit</label><br>
            <select class="form-control" name="cb">
                <option selected="true" disabled="true">Pilih Cost / Benefit</option>
                <option value="Cost">Cost</option>
                <option value="Benefit">Benefit</option>
            </select>
        <br>
        <hr>
        <div class="form-group">
            <a href="/analyst" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br><br>
   
    
@endsection