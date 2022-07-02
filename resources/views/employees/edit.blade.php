@extends('layouts.app')

@section('content')
    <h1><b>EDIT DATA</b></h1>
    <hr>
    {!! Form::open(['action' => ['EmployeesController@update', $employee->nik], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('pas_foto', 'Pas Foto ( tidak perlu upload jika tidak ada perubahan )')}}<br>
            {{Form::file('pas_foto', [$employee->pas_foto])}}
        </div>
        <div class="form-group"> 
            {{Form::label('nik', 'NIK (Nomor Induk Kependudukan)')}}
            {{Form::text('nik', $employee->nik, ['class' => 'form-control', 'placeholder' => 'Masukkan NIK'])}}
        </div>
        <div class="form-group">
            {{Form::label('nama_lengkap', 'Nama Lengkap')}}
            {{Form::text('nama_lengkap', $employee->nama_lengkap, ['class' => 'form-control', 'placeholder' => 'Masukkan nama lengkap'])}}
        </div>
        {{-- <div class="form-group">
            {{Form::label('jenis_kelamin', 'Jenis Kelamin')}}<br>
            {{Form::select('jenis_kelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], ['active' => $employee->jenis_kelamin])}}
        </div> --}}

        <label>Jenis Kelamin</label><br>
            <select class="form-control" name="jenis_kelamin">
                <option selected="true" disabled="true"> Pilih jenis kelamin </option>
                <option value="Laki-laki" <?php echo $employee->jenis_kelamin == 'Laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo $employee->jenis_kelamin == 'Perempuan' ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('tempat_lahir', 'Tempat Lahir')}}
            {{Form::text('tempat_lahir', $employee->tempat_lahir, ['class' => 'form-control', 'placeholder' => 'Masukkan tempat kelahiran'])}}
        </div>
        <div class="form-group">
            {{Form::label('tgl_lahir', 'Tanggal Lahir (mm/dd/yyyy)')}}<br>
            {{Form::date('tgl_lahir', \Carbon\Carbon::CreateFromDate($employee->tgl_lahir))}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $employee->email, ['class' => 'form-control', 'placeholder' => 'Masukkan email'])}}
        </div>

        {{-- <div class="form-group">
            {{Form::label('agama', 'Agama')}}<br>
            {{Form::select('agama', ['Kristen Protestan' => 'Kristen Protestan', 'Katolik' => 'Katolik', 'Islam' => 'Islam', 'Buddha' => 'Buddha', 'Hindu' => 'Hindu', 'lain-lain' => 'lain-lain'], ['active' => $employee->agama])}}
        </div> --}}

        <label>Agama</label><br>
            <select class="form-control" name="agama">
                <option selected="true" disabled="true"> Pilih agama </option>
                <option value="Kristen Protestan" <?php echo $employee->agama == 'Kristen Protestan' ? 'selected' : ''; ?>>Kristen Protestan</option>
                <option value="Katolik" <?php echo $employee->agama == 'Katolik' ? 'selected' : ''; ?>>Katolik</option>
                <option value="Islam" <?php echo $employee->agama == 'Islam' ? 'selected' : ''; ?>>Islam</option>
                <option value="Buddha" <?php echo $employee->agama == 'Buddha' ? 'selected' : ''; ?>>Buddha</option>
                <option value="Hindu" <?php echo $employee->agama == 'Hindu' ? 'selected' : ''; ?>>Hindu</option>
                <option value="lain-lain" <?php echo $employee->agama == 'lain-lain' ? 'selected' : ''; ?>>lain-lain</option>
            </select>
        <br>

        {{-- <div class="form-group">
            {{Form::label('marital', 'Marital')}}<br>
            {{Form::select('marital', ['Belum Menikah' => 'Belum Menikah', 'Menikah' => 'Menikah', 'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati'], ['active' => $employee->marital])}}
        </div> --}}

        <label>Marital</label><br>
            <select class="form-control" name="marital">
                <option selected="true" disabled="true"> Pilih marital</option>
                <option value="Belum Menikah" <?php echo $employee->marital == 'Belum Menikah' ? 'selected' : ''; ?>>Belum Menikah</option>
                <option value="Menikah" <?php echo $employee->marital == 'Menikah' ? 'selected' : ''; ?>>Menikah</option>
                <option value="Cerai Hidup" <?php echo $employee->marital == 'Cerai Hidup' ? 'selected' : ''; ?>>Cerai Hidup</option>
                <option value="Cerai Mati" <?php echo $employee->marital == 'Cerai Mati' ? 'selected' : ''; ?>>Cerai Mati</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('ijazah_terakhir', 'Ijazah Terakhir')}}
            {{Form::text('ijazah_terakhir', $employee->ijazah_terakhir, ['class' => 'form-control', 'placeholder' => 'Masukkan ijazah terakhir'])}}
        </div>

        {{-- <div class="form-group">
            {{Form::label('status_kepegawaian', 'Status Kepegawaian')}}<br>
            {{Form::select('status_kepegawaian', ['Tetap' => 'Tetap', 'Tidak Tetap' => 'Tidak Tetap'], ['active' => $employee->status_kepegawaian])}}
        </div> --}}

        <label>Status Kepegawaian</label><br>
            <select class="form-control" name="status_kepegawaian">
                <option selected="true" disabled="true"> Pilih status kepegawaian </option>
                <option value="Tetap" <?php echo $employee->status_kepegawaian == 'Tetap' ? 'selected' : ''; ?>>Tetap</option>
                <option value="Tidak Tetap" <?php echo $employee->status_kepegawaian == 'Tidak Tetap' ? 'selected' : ''; ?>>Tidak Tetap</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('jabatan', 'Jabatan')}}
            {{Form::text('jabatan', $employee->jabatan, ['class' => 'form-control', 'placeholder' => 'Masukkan jabatan'])}}
        </div>

        {{-- <div class="form-group">
            {{Form::label('tempat_bekerja', 'Tempat Bekerja')}}<br>
            {{Form::select('tempat_bekerja', ['Sekretariat' => 'Sekretariat', 'TK' => 'TK', 'SD' => 'SD', 'SMP' => 'SMP', 'SMA' => 'SMA'], ['active' => $employee->tempat_bekerja])}}
        </div> --}}

        <label>Tempat Bekerja</label><br>
            <select class="form-control" name="tempat_bekerja">
                <option selected="true" disabled="true"> Pilih tempat bekerja </option>
                <option value="Sekretariat" <?php echo $employee->tempat_bekerja == 'Sekretariat' ? 'selected' : ''; ?>>Sekretariat</option>
                <option value="TK" <?php echo $employee->tempat_bekerja == 'TK' ? 'selected' : ''; ?>>TK</option>
                <option value="SD" <?php echo $employee->tempat_bekerja == 'SD' ? 'selected' : ''; ?>>SD</option>
                <option value="SMP" <?php echo $employee->tempat_bekerja == 'SMP' ? 'selected' : ''; ?>>SMP</option>
                <option value="SMA" <?php echo $employee->tempat_bekerja == 'SMA' ? 'selected' : ''; ?>>SMA</option>
            </select>
        <br>

        <div class="form-group">
            {{Form::label('tgl_masuk_kerja', 'Tanggal Masuk Kerja (mm/dd/yyyy)')}}<br>
            {{Form::date('tgl_masuk_kerja', \Carbon\Carbon::CreateFromDate($employee->tgl_masuk_kerja))}}
        </div>
        <div class="form-group">
            {{Form::label('tgl_pengangkatan', 'Tanggal Pengangkatan (mm/dd/yyyy)')}}<br>
            {{Form::date('tgl_pengangkatan', \Carbon\Carbon::CreateFromDate($employee->tgl_pengangkatan))}}
        </div>

        {{-- <div class="form-group">
            {{Form::label('golongan_terakhir', 'Golongan Terakhir')}}
            {{Form::text('golongan_terakhir', $employee->golongan_terakhir, ['class' => 'form-control', 'placeholder' => 'Masukkan golongan terakhir'])}}
        </div> --}}

       {{-- <label>Golongan Terakhir</label><br>
            <select class="form-control" name="id_golongan">
                <option selected="true" disabled="true">Pilih Golongan</option>
                    @foreach ($salaryGroup as $golongan)
                        <option value="{{ $golongan->id_golongan }}" 
                            @if ($golongan->id_golongan === $employee->salary_groups->id_golongan)
                                selected
                            @endif >
                            {{ $golongan->nama_golongan }}
                        </option>
                    @endforeach
            </select>
        <br> --}}
        <label>Golongan Terakhir</label><br>
            <select class="form-control" name="id_golongan">
                <option selected="true" disabled="true">Masukan Golongan Terakhir</option>
                    @foreach ($salaryGroup as $gol)
                        <option value="{{ $gol->id_golongan }}"> 
                            {{ $gol->nama_golongan }} 
                        </option>
                    @endforeach    
            </select>
        <br>

        <div class="form-group">
            {{Form::label('usia_pensiun', 'Usia Pensiun ( tahun )')}}
            {{Form::text('usia_pensiun', $employee->usia_pensiun, ['class' => 'form-control', 'placeholder' => 'Masukkan usia pensiun'])}}
        </div>
        <hr>
        <div class="form-group">
            <a href="/employees" class="btn btn-dark" 
            style="height:45px;width:150px;margin:2px 0px;font-size:18px">Kembali</a>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Simpan Data', ['class' => "btn btn-success", 
            'style' => "height:45px;width:150px;margin:2px 0px;font-size:18px;float:right"])}}
        </div>
        <br><br>
        
    {!! Form::close() !!}
    
@endsection