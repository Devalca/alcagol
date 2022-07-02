<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistem Penggajian Guru dan Karyawan</title>
    <link rel = "icon" href = "/storage/logo/Logo BPK Penabur kotak.png" type = "image/x-icon" width = "100x100">
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <?php
        use App\Models\Employee;
        use App\Models\Golongan;
    ?>

</head>
<body>
    <div class="container">
        <div class="card card-shadow">
            <div class="container">
                <p style="font-size:24px;line-height:2rem;margin-top:1rem;font-family: Exotc350 Bd BT;text-align:center">BADAN PENDIDIKAN KRISTEN PENABUR<br>KOTA SUKABUMI</p>
                <p style="font-size:32px;font-family: Exotc350 Bd BT;text-decoration:underline;text-align:center">SLIP GAJI</p>
                    <p style="font-size:18px;line-height:20px;">Nama Lengkap : Ferdinand Firman Kusuma<br>
                    Jabatan : Guru Matematika<br>
                    Tempat Bekerja : SMAK<br>
                    Golongan Terakhir : 3A<br>
                    Tanggal : 28 Agustus 2021</p>
            </div>
        
    
        {{-- <div class="container">
            <div class="card shadow" style="margin: 15pt">
                <div class="row">
                    <div class="col-8">
                        <div class="row" style="line-height:1cm">
                            <img style="margin:19pt 14pt 0pt 30pt"src="/storage/logo/Logo BPK Penabur.png" alt="" width="48pt" height="60pt">
                            <a style="font-size:32px;margin-top:13pt;font-family: Exotc350 Bd BT">BADAN PENDIDIKAN KRISTEN PENABUR<br>KOTA SUKABUMI</a>
                        </div>
                    </div>
                    <div class="col-4">
                        <p style="font-size:54px;font-family: Exotc350 Bd BT;margin:8pt 20pt 0pt 0pt;text-align:right;text-decoration:underline">SLIP GAJI</p>
                    </div>
                </div>
            <hr>
                <div class="row" style="line-height:8px;font-size:16px">
                    <div class="col" style="margin-left:20px">
                        <div class="row">
                            <div class="col-5"><p>Nama Lengkap</p></div>
                            <div class="col-7"><p>: Ferdinand Firman Kusuma</p></div>
                        </div>
                        <div class="row">
                            <div class="col-5"><p>Jabatan</p></div>
                            <div class="col-7"><p>: Guru Matematika</p></div>
                        </div>
                        <div class="row">
                            <div class="col-5"><p>Tempat Bekerja</p></div>
                            <div class="col-7"><p>: SMAK</p></div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="col-5"><p>Golongan Terakhir</p></div>
                            <div class="col-7"><p>: 3A</p></div>
                        </div>
                        <div class="row">
                            <div class="col-5"><p>Tanggal</p></div>
                            <div class="col-7"><p>: 28 Agustus 2021</p></div>
                        </div>
                    </div>
                </div> --}}
            <hr>
            <div class="container">
                <table>
                    <tr>
                        <th class="col-5">Penerimaan</th>
                        <th class="col-4"></th>
                        <th class="col-5">Potongan</th>
                        <th class="col-4"></th>
                    </tr>
                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>Maria Anders</td>
                        <td>Germany</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Centro comercial Moctezuma</td>
                        <td>Francisco Chang</td>
                        <td>Mexico</td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    {{-- <table class="table table-striped" style="font-size:12pt">
        <thead class="thead-dark">
            <tr>
                <th scope="row" width='20%'>Penerimaan</th>
                <th width='25%' style="text-align:right"></th>
                <th style="width:5rem"></th>
                <th scope="row" width='20%'>Potongan</th>
                <th width='25%' style="text-align:right"></th>
            </tr>
            <tr>
                <td scope="row">Gaji Pokok</td>
                <td style="text-align:right">Rp. {{number_format(6000000,0,",",".")}}</td>
                <td></td>
                <td scope="row">Tunjangan</td>
                <td style="text-align:right">Rp. {{number_format(5000000,0,",",".")}}</td>
            </tr> --}}
            {{--<tr>
                <th scope="row">TANGGAL LAHIR</th>
                <td>{{$employee->tgl_lahir}}</td>
                <th scope="row">EMAIL</th>
                <td>{{$employee->email}}</td>
            </tr>
            <tr>
                <th scope="row">AGAMA</th>
                <td>{{$employee->agama}}</td>
                <th scope="row">MARITAL</th>
                <td>{{$employee->marital}}</td>
            </tr>
            <tr>
                <th scope="row">IJAZAH TERAKHIR</th>
                <td>{{$employee->ijazah_terakhir}}</td>
                <th scope="row">STATUS KEPEGAWAIAN</th>
                <td>{{$employee->status_kepegawaian}}</td>
            </tr>
            <tr>
                <th scope="row">JABATAN</th>
                <td>{{$employee->jabatan}}</td>
                <th scope="row">TEMPAT BEKERJA</th>
                <td>{{$employee->tempat_bekerja}}</td>
            </tr>
            <tr>
                <th scope="row">TANGGAL MASUK KERJA</th>
                <td>{{$employee->tgl_masuk_kerja}}</td>
                <th scope="row">TANGGAL PENGANGKATAN</th>
                <td>{{$employee->tgl_pengangkatan}}</td>
            </tr>
            <tr>
                <th scope="row">GOLONGAN TERAKHIR</th>
                <td>{{$employee->golongan_terakhir}}</td>
                <th scope="row">LAMA BEKERJA</th>
                <td>{{$employee->lama_bekerja}} tahun</td>
            </tr>
            <tr>
                <th scope="row">USIA PENSIUN</th>
                <td>{{$employee->usia_pensiun}} tahun</td>
                <th scope="row">USIA SEKARANG</th>
                <td>{{$employee->usia_sekarang}} tahun</td>
            </tr>
            <tr>
                <th scope="row">PERKIRAAN PENSIUN</th>
                <td>{{$employee->perkiraan_pensiun}} tahun</td>
            </tr>
        </thead>
    </table>
    <table class="table" style="margin:10px 0px;font-size:12pt">
    <thead>
        <tr>
            <th scope="row" width='50%'><center><a href="/employees/{{$employee->nik}}/edit" 
                class="btn btn-primary" style="height:48px;width:200pt;margin:5pt 0pt 5pt 0pt;font-size:16pt">
                Edit</a></center></th>
            <th scope="row" width='50%'><center>
                {!!Form::open(['action' => ['EmployeesController@destroy', $employee->nik], 'method' => 'POST'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                    'style' => "height:48px;width:200pt;margin:5pt 0pt 5pt 0pt;font-size:16pt"])}}
                {!!Form::close()!!}</center>
            </th>
        </tr> --}}
    </thead>
    </table>
</body>

</html>