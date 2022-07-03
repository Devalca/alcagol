@extends('layouts.app')

@section('content')
    <h1><b>Data Gaji</b></h1> 
    <hr>
    @if(count($employees) > 0)
    <a href="/salary/create" class="btn btn-success" 
    style="height:40px;font-size:16px;margin:5px 0px 5px 0px">+ Tambah Data</a>
    @else
        <h1><b>Data Karyawan Kosong</b></h1>
        <br>
    @endif

@if(count($salary) > 0)
    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">NIK</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Nama Lengkap</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Jabatan</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Gaji Pokok</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Lembur</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Tunjangan Istri</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Tunjangan Anak</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Absen</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Cuti</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Total</th>
                <th scope="col"></th>
                <th class="col-2" colspan="2" style="vertical-align:middle">ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach($salary as $salarys)
            
            <tr>
                <td style="vertical-align:middle;text-align:center">{{$salarys->id_user}}</td>
                <td style="vertical-align:middle;text-align:center">{{$salarys->nama_lengkap}}</td>
                <td style="vertical-align:middle;text-align:center">{{$salarys->jabatan}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->gaji_pokok,0,",",".")}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->lembur,0,",",".")}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->t_istri,0,",",".")}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->t_anak,0,",",".")}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->absen,0,",",".")}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->cuti,0,",",".")}}</td>
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salarys->total,0,",",".")}}</td>
                <th></th>
                <th style="vertical-align:middle;text-align:center">
                    <a href="/salary/{{$salarys->id_user}}/edit" class="btn btn-primary" 
                        style="height:28px;width:80px;padding:1px">
                        Edit</a></th>
                <th style="vertical-align:middle;width:10px;text-align:center">
                    {!!Form::open(['action' => ['SalaryController@destroy', $salarys->id_user], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                        'style' => "height:28px;width:80px;padding:1px;horizontal-align:middle"])}}
                    {!!Form::close()!!}
                </th>
            </tr>

            @endforeach

        </tbody>
    </table>
    
    <p>{{ $salary->links() }}</p>

@else
    <br><br>
    <p style="font-size:24px">Belum Ada Data</p>
@endif

@endsection