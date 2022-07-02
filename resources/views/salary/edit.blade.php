@extends('layouts.app')

@section('content')
    <h1><b>EDIT DATA</b></h1>
    <hr>
    {!! Form::open(['action' => ['SalaryController@update', $salary->id_user], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('lembur', 'Lembur')}}
            {{Form::text('lembur', $salary->lembur, ['class' => 'form-control', 'placeholder' => 'Masukkan Lembur'])}}
        </div>
        <div class="form-group">
            {{Form::label('t_istri', 'Tunjangan Istri')}}
            {{Form::text('t_istri', $salary->t_istri, ['class' => 'form-control', 'placeholder' => 'Masukkan Tunjangan Istri'])}}
        </div>
        <div class="form-group">
            {{Form::label('t_anak', 'Tunjangan Anak')}}
            {{Form::text('t_anak', $salary->t_anak, ['class' => 'form-control', 'placeholder' => 'Masukkan Tunjangan Anak'])}}
        </div>
        <div class="form-group">
            {{Form::label('absen', 'Absen')}}
            {{Form::text('absen', $salary->absen, ['class' => 'form-control', 'placeholder' => 'Masukkan Absen'])}}
        </div>
        <div class="form-group">
            {{Form::label('cuti', 'Cuti')}}
            {{Form::text('cuti', $salary->cuti, ['class' => 'form-control', 'placeholder' => 'Masukkan Cuti'])}}
        </div>
        <hr>
        <div class="form-group">
            <a href="/salary" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br>
    {!! Form::close() !!} 
    
@endsection