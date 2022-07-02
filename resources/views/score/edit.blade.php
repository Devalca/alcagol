@extends('layouts.app')

@section('content')
    <h1><b>EDIT DATA</b></h1>
    <hr>
    {!! Form::open(['action' => ['ScoreController@update', $score->nik], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('k1', 'Kualitas Kerja')}}
            {{Form::text('k1', $score->k1, ['class' => 'form-control', 'placeholder' => 'Masukkan Kualitas Kerja'])}}
        </div>
        <div class="form-group">
            {{Form::label('k2', 'Ketelitian Kerja')}}
            {{Form::text('k2', $score->k2, ['class' => 'form-control', 'placeholder' => 'Masukkan Ketelitian Kerja'])}}
        </div>
        <div class="form-group">
            {{Form::label('k3', 'Tanggung Jawab')}}
            {{Form::text('k3', $score->k3, ['class' => 'form-control', 'placeholder' => 'Masukkan Tanggung Jawab'])}}
        </div>
        <div class="form-group">
            {{Form::label('k4', 'Profesionalisme')}}
            {{Form::text('k4', $score->k4, ['class' => 'form-control', 'placeholder' => 'Masukkan Profesionalisme'])}}
        </div>
        <div class="form-group">
            {{Form::label('k5', 'Inisiatif')}}
            {{Form::text('k5', $score->k5, ['class' => 'form-control', 'placeholder' => 'Masukkan Inisiatif'])}}
        </div>
        <div class="form-group">
            {{Form::label('k6', 'Prilaku')}}
            {{Form::text('k6', $score->k6, ['class' => 'form-control', 'placeholder' => 'Masukkan Prilaku'])}}
        </div>

        <hr>
        <div class="form-group">
            <a href="/score" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br>
    {!! Form::close() !!} 
    
@endsection