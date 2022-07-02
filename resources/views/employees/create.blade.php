@extends('layouts.app')

@section('content')
    <h1><b>TAMBAH DATA</b></h1>
    <hr>
    {!! Form::open(['action' => 'EmployeesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('pas_foto', 'Pas Foto')}}<br>
            {{Form::file('pas_foto')}}
        </div>
        <div class="form-group">
            {{Form::label('nik', 'NIK (Nomor Induk Kependudukan)')}}
            {{Form::text('nik', '', ['class' => 'form-control', 'placeholder' => 'Masukkan NIK'])}}
        </div>
        <div class="form-group">
            {{Form::label('nama_lengkap', 'Nama Lengkap')}}
            {{Form::text('nama_lengkap', '', ['class' => 'form-control', 'placeholder' => 'Masukkan nama lengkap'])}}
        </div>
        
        {{-- <div class="form-group">
            {{Form::label('jenis_kelamin', 'Jenis Kelamin')}}<br>
            {{Form::select('jenis_kelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], ['placeholder' => 'jenis kelamin'])}}
        </div> --}}

        <label>Jenis Kelamin</label><br>
            <select class="form-control" name="jenis_kelamin">
                <option selected="true" disabled="true">Pilih jenis kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('tempat_lahir', 'Tempat Lahir')}}
            {{Form::text('tempat_lahir', '', ['class' => 'form-control', 'placeholder' => 'Masukkan tempat kelahiran'])}}
        </div>
        <div class="form-group">
            {{Form::label('tgl_lahir', 'Tanggal Lahir (mm/dd/yyyy)')}}<br>
            {{Form::date('tgl_lahir', \Carbon\Carbon::now())}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Masukkan email'])}}
        </div>

        {{-- <div class="form-group">
            {{Form::label('agama', 'Agama')}}<br>
            {{Form::select('agama', ['Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Islam' => 'Islam', 'Buddha' => 'Buddha', 'Hindu' => 'Hindu', 'lain-lain' => 'lain-lain'])}}
        </div> --}}

        <label>Agama</label><br>
            <select class="form-control" name="agama">
                <option selected="true" disabled="true">Pilih agama</option>
                <option value="Kristen Protestan">Kristen Protestan</option>
                <option value="Katolik">Katolik</option>
                <option value="Islam">Islam</option>
                <option value="Buddha">Buddha</option>
                <option value="Hindu">Hindu</option>
                <option value="lain-lain">lain-lain</option>
            </select>
        <br>

        {{-- <div class="form-group">
            {{Form::label('marital', 'Marital')}}<br>
            {{Form::select('marital', ['Belum Menikah' => 'Belum Menikah', 'Menikah' => 'Menikah', 'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati'])}}
        </div> --}}

        <label>Marital</label><br>
            <select class="form-control" name="marital">
                <option selected="true" disabled="true">Pilih marital</option>
                <option value="Belum Menikah">Belum Menikah</option>
                <option value="Menikah">Menikah</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('ijazah_terakhir', 'Ijazah Terakhir')}}
            {{Form::text('ijazah_terakhir', '', ['class' => 'form-control', 'placeholder' => 'Masukkan ijazah terakhir'])}}
        </div>
        {{-- <div class="form-group">
            {{Form::label('status_kepegawaian', 'Status Kepegawaian')}}<br>
            {{Form::select('status_kepegawaian', ['Tetap' => 'Tetap', 'Tidak Tetap' => 'Tidak Tetap'])}}
        </div> --}}

        <label>Status Kepegawaian</label><br>
            <select class="form-control" name="status_kepegawaian">
                <option selected="true" disabled="true"> Pilih status kepegawaian</option>
                <option value="Tetap">Tetap</option>
                <option value="Tidak Tetap">Tidak Tetap</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('jabatan', 'Jabatan')}}
            {{Form::text('jabatan', '', ['class' => 'form-control', 'placeholder' => 'Masukkan jabatan'])}}
        </div>

        {{-- <div class="form-group">
            {{Form::label('tempat_bekerja', 'Tempat Bekerja')}}<br>
            {{Form::select('tempat_bekerja', ['Sekretariat' => 'Sekretariat', 'TK' => 'TK', 'SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA'])}}
        </div> --}}

        <label>Tempat Bekerja</label><br>
            <select class="form-control" name="tempat_bekerja">
                <option selected="true" disabled="true">Pilih tempat bekerja</option>
                <option value="Sekretariat">Sekretariat</option>
                <option value="TK">TK</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('tgl_masuk_kerja', 'Tanggal Masuk Kerja (mm/dd/yyyy)')}}<br>
            {{Form::date('tgl_masuk_kerja', \Carbon\Carbon::now())}}
        </div>
        <div class="form-group">
            {{Form::label('tgl_pengangkatan', 'Tanggal Pengangkatan (mm/dd/yyyy)')}}<br>
            {{Form::date('tgl_pengangkatan', \Carbon\Carbon::now())}}
        </div>
        {{-- <div class="form-group">
            {{Form::label('golongan_terakhir', 'Golongan Terakhir')}}
            {{Form::text('golongan_terakhir', '', ['class' => 'form-control', 'placeholder' => 'Masukkan golongan terakhir'])}}
        </div> --}}
  
        {{-- <div class="form-group">
            {!! Form::Label('golongan', 'Golongan') !!}
            {!! Form::select('golongan', $salaryGroup, $selectedID, ['class' => 'form-control']) !!}
        </div> --}}
  
        {{-- <label>Golongan Terakhir</label><br>
            <select class="form-control" name="id_golongan">
                <option selected="true" disabled="true">Pilih golongan</option>
                    @foreach ($salaryGroup as $golongan)
                        <option value="{{ $golongan->id_golongan }}"> 
                            {{ $golongan->nama_golongan }} 
                        </option>
                    @endforeach    
            </select>
        <br> --}}
        
        <div class="form-group">
            {{Form::label('usia_pensiun', 'Usia Pensiun (tahun)')}}
            {{Form::text('usia_pensiun', '', ['class' => 'form-control', 'placeholder' => 'Masukkan usia pensiun'])}}
        </div>
        <hr>
        <div class="form-group">
            <a href="/employees" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br><br>
    {!! Form::close() !!}
    
@endsection