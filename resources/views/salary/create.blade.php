@extends('layouts.app')

@section('content')
    <h1><b>TAMBAH DATA</b></h1>
    @if(count($analysts) > 0)
    <hr>
    {!! Form::open(['action' => 'SalaryController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <label>Nama Lengkap</label><br>
            <select class="form-control" name="nama_lengkap">
                <option selected="true" disabled="true">Nama Lengkap</option>
                    @foreach ($employees as $enik)
                        @if ($salary->contains('id_user', $enik->nik))
                            <option selected="true" disabled="true">-</option>
                        @else
                            @if ($enik->id_golongan)
                            <option value="{{ $enik->nik }}"> 
                                {{ $enik->nama_lengkap }} 
                            </option>
                            @else
                            <option disabled="true"> 
                                {{ $enik->nama_lengkap }}: Gaji Pokok Belum di Update 
                            </option>
                            @endif
                        @endif
                    @endforeach    
            </select>
        <br>
        <div class="form-group">
            {{Form::label('lembur', 'Uang Lembur')}}
            {{Form::text('lembur', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Uang Lembur'])}}
        </div>
        <div class="form-group">
            {{Form::label('t_istri', 'Tunjangan Istri')}}
            {{Form::text('t_istri', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Tunjangan Istri'])}}
        </div>
        <div class="form-group">
            {{Form::label('t_anak', 'Tunjangan Anak')}}
            {{Form::text('t_anak', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Tunjangan Anak'])}}
        </div>
        <div class="form-group">
            {{Form::label('absen', 'Absen Tanpa Keterangan')}}
            {{Form::text('absen', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Absen Tanpa Keterangan'])}}
        </div>
        <div class="form-group">
            {{Form::label('cuti', 'Cuti')}}
            {{Form::text('cuti', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Cuti'])}}
        </div>
        <hr>
        <div class="form-group">
            <a href="/salary" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br><br>
    @else
        <h1><b>Data Analyst Kosong</b></h1>
        <br>
    @endif
    
@endsection