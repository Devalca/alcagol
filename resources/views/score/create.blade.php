@extends('layouts.app')

@section('content')
    <h1><b>TAMBAH DATA</b></h1>
    @if(count($employees) > 0)
    <hr>
    {!! Form::open(['action' => 'ScoreController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <br><br>
    <p>Catatan:<p>
    <p>Poin minimal 10 maximal 100<p>
    <br><br>
    <label>Nama Lengkap</label><br>
            <select class="form-control" name="nama_lengkap">
                <option selected="true" disabled="true">Nama Lengkap</option>
                    @foreach ($employees as $enik)
                        @if ($score->contains('nik', $enik->nik))
                            <option selected="true" disabled="true">-</option>
                        @else 
                            <option value="{{ $enik->nik }}"> 
                                {{ $enik->nama_lengkap }} 
                            </option>
                        @endif
                    @endforeach    
            </select>
        <br>
        <div class="form-group">
            {{Form::label('k1', 'Kualitas Kerja')}}
            {{Form::text('k1', '', ['class' => 'form-control', 'placeholder' => 'Masukkan Kualitas Kerja'])}}
        </div>
        <div class="form-group">
            {{Form::label('k2', 'Ketelitian Kerja')}}
            {{Form::text('k2', '', ['class' => 'form-control', 'placeholder' => 'Ketelitian Kerja'])}}
        </div>
        <div class="form-group">
            {{Form::label('k3', 'Tanggung Jawab')}}
            {{Form::text('k3', '', ['class' => 'form-control', 'placeholder' => 'Tanggung Jawab'])}}
        </div>
        <div class="form-group">
            {{Form::label('k4', 'Profesionalisme')}}
            {{Form::text('k4', '', ['class' => 'form-control', 'placeholder' => 'Profesionalisme'])}}
        </div>
        <div class="form-group">
            {{Form::label('k5', 'Inisiatif')}}
            {{Form::text('k5', '', ['class' => 'form-control', 'placeholder' => 'Inisiatif'])}}
        </div>
        <div class="form-group">
            {{Form::label('k6', 'Prilaku')}}
            {{Form::text('k6', '', ['class' => 'form-control', 'placeholder' => 'Prilaku'])}}
        </div>
        <hr>
        <div class="form-group">
            <a href="/analyst" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br><br>
    @else
        <h1><b>Data Karyawan Kosong</b></h1>
        <br>
    @endif
    
@endsection