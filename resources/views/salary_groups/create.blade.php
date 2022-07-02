@extends('layouts.app')

@section('content')
    <h1><b>TAMBAH DATA</b></h1>
    <hr>
    {!! Form::open(['action' => 'SalaryGroupController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('nama_golongan', 'Nama Golongan')}}
            {{Form::text('nama_golongan', '', ['class' => 'form-control', 'placeholder' => 'Masukkan nama golongan'])}}
        </div>
        <div class="form-group">
            {{Form::label('gaji_pokok', 'Gaji Pokok')}}
            {{Form::text('gaji_pokok', '', ['class' => 'form-control', 'placeholder' => 'Masukkan nominal gaji pokok'])}}
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
    {{-- <select name="first-digit">
        @foreach (FirstDigit::all() as $firstDigit)
            <option value ="{{$firstDigit->type}}">
        @endforeach
    </select>
    <select name="second-digit">
        @foreach (SecondDigit::all() as $secondDigit)
            <option value ="{{$secondDigit->type}}">
        @endforeach
    </select>
    <select name="third-digit">
        @foreach (ThirdDigit::all() as $thirdDigit)
            <option value ="{{$thirdDigit->type}}">
        @endforeach
    </select> --}}
    
@endsection