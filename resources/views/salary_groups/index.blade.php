@extends('layouts.app')

@section('content')
    <h1><b>GOLONGAN</b> 

        {{-- {!!Form::open(['action' => ['SalaryGroupController@destroy_all'], 'method' => 'POST'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Hapus Semua Data', ['class' => 'btn btn-dark', 
            'style' => "float:right;height:40px;font-size:16px;margin:5px 0px 5px 0px"])}}
        {!!Form::close()!!}</h1> --}}
        
    
    <hr>
    @if(count($salary_groups) < 3)
    <a href="/salary_groups/create" class="btn btn-success" 
    style="height:40px;font-size:16px;margin:5px 0px 5px 0px">+ Tambah Data</a>
    @else
    <p style="font-size:24px">Jumlah Golongan Sudah Mencapai Batas</p>
    @endif
    
@if(count($salary_groups) > 0)
    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">ID</th>
                <th class="col-4" scope="col" style="vertical-align:middle">NAMA GOLONGAN</th>
                {{-- <th class="col-3" scope="col" style="vertical-align:middle">PERSENTASE KENAIKAN (%)</th> --}}
                <th class="col-4" scope="col" style="vertical-align:middle">GAJI POKOK</th>
                <th scope="col"></th>
                <th class="col-2" colspan="2" style="vertical-align:middle">ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach($salary_groups as $salary_group)
            
            <tr>
                <td style="vertical-align:middle;text-align:center">{{$salary_group->id_golongan}}</td>
                <td style="vertical-align:middle;text-align:center">{{$salary_group->nama_golongan}}</td>
                {{-- <th style="vertical-align:middle;text-align:center;width:9rem">{{$salary_group->persentase_kenaikan}}</th> --}}
                <td style="vertical-align:middle;text-align:right">Rp. {{number_format($salary_group->gaji_pokok,0,",",".")}}</td>
                <th></th>
                <th style="vertical-align:middle;text-align:center">
                    <a href="/salary_groups/{{$salary_group->id_golongan}}/edit" class="btn btn-primary" 
                        style="height:28px;width:80px;padding:1px">
                        Edit</a></th>
                <th style="vertical-align:middle;width:10px;text-align:center">
                    {!!Form::open(['action' => ['SalaryGroupController@destroy', $salary_group->id_golongan], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                        'style' => "height:28px;width:80px;padding:1px;horizontal-align:middle"])}}
                    {!!Form::close()!!}
                </th>
            </tr>

            @endforeach

        </tbody>
    </table>
    
    <p>{{ $salary_groups->links() }}</p>

@else
    <br><br>
    <p style="font-size:24px">Belum Ada Data</p>
@endif

@endsection