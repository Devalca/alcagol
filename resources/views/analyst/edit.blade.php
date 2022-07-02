@extends('layouts.app')

@section('content')
    <h1><b>EDIT DATA</b></h1>
    <hr>
    {!! Form::open(['action' => ['AnalystController@update', $analyst->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('kriteria', 'Kriteria')}}
            {{Form::text('kriteria', $analyst->kriteria, ['class' => 'form-control', 'placeholder' => 'Masukkan Kriteria'])}}
        </div>
        <div class="form-group">
            {{Form::label('bobot', 'Bobot')}}
            {{Form::text('bobot', $analyst->bobot, ['class' => 'form-control', 'placeholder' => 'Masukkan Bobot'])}}
        </div>
        <label>Cost / Benefit</label><br>
            <select class="form-control" name="cb">
                <option value="{{$analyst->cb}}" selected="true">Default : {{$analyst->cb}}</option>
                <option value="Cost">Cost</option>
                <option value="Benefit">Benefit</option>
            </select>
        <br>

        <hr>
        <div class="form-group">
            <a href="/analyst" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br>
    {!! Form::close() !!} 
    
@endsection