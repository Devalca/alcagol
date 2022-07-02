@extends('layouts.app')

@section('content')
    <h1><b>Data Kriteria</b></h1>
        
    <hr>
    <a href="/analyst/create" class="btn btn-success" 
    style="height:40px;font-size:16px;margin:5px 0px 5px 0px">+ Tambah Data</a>

@if(count($analyst) > 0)
    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">Kriteria</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Bobot</th>
                <th class="col-2" scope="col" style="vertical-align:middle">Cost / Benefit</th>
                <th class="col-2" colspan="2" style="vertical-align:middle">ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach($analyst as $analysts)
            
            <tr>
                <td style="vertical-align:middle;text-align:center">{{$analysts->kriteria}}</td>
                <td style="vertical-align:middle;text-align:center">{{$analysts->bobot}}</td>
                <td style="vertical-align:middle;text-align:center">{{$analysts->cb}}</td>
                <th style="vertical-align:middle;text-align:center">
                    <a href="/analyst/{{$analysts->id}}/edit" class="btn btn-primary" 
                        style="height:28px;width:80px;padding:1px">
                        Edit</a></th>
                <th style="vertical-align:middle;width:10px;text-align:center">
                    {!!Form::open(['action' => ['AnalystController@destroy', $analysts->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                        'style' => "height:28px;width:80px;padding:1px;horizontal-align:middle"])}}
                    {!!Form::close()!!}
                </th>
            </tr>

            @endforeach

        </tbody>
    </table>
    
    <p>{{ $analyst->links() }}</p>

@else
    <br><br>
    <p style="font-size:24px">Belum Ada Data</p>
@endif

@endsection