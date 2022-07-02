@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 style="margin-top:12px"><b>GURU DAN KARYAWAN</b></h1>
            <nav class="navbar navbar-expand-lg navbar-light bg-light" style="margin-left:40px;float:right">
                <ul class="navbar-nav mx-auto" style="text-align:center">
                    <li><a class="btn btn-outline-dark" style="height:36px;font-size:15px;width:100px;margin-right:6px" href="/employees">SEMUA</a></li>
                    <li><a class="btn btn-outline-dark" style="height:36px;font-size:15px;width:140px;margin:0px 6px" href="/employees/sekre">SEKRETARIAT</a></li>
                    <li><a class="btn btn-outline-dark" style="height:36px;font-size:15px;width:75px;margin:0px 6px" href="/employees/tk">TK</a></li>
                    <li><a class="btn btn-outline-dark" style="height:36px;font-size:15px;width:75px;margin:0px 6px" href="/employees/sd">SD</a></li>
                    <li><a class="btn btn-outline-dark" style="height:36px;font-size:15px;width:75px;margin:0px 6px" href="/employees/smp">SMP</a></li>
                    <li><a class="btn btn-outline-dark" style="height:36px;font-size:15px;width:75px;margin-left:6px" href="/employees/sma">SMA</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <hr>
    
    <a href="/employees/create" class="btn btn-success align-right" 
    style="height:40px;font-size:16px;margin-top:5px">+ Tambah Data</a>
    
    <form action="/search" method="get" style="float:right;font-size:16px;margin:10px 0px 0px 0px">
        <div class="input-group">
            <input class="form-control" type="search" placeholder="ketik disini untuk mencari nama" 
            name="search" style="width:7cm;height:36px;font-size:16px">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-outline-secondary" 
                style="height:36px;font-size:16px;margin-bottom:2px">Search</button>
            </span>
        </div>
    </form>
    
@if(count($employees) > 0)
    <table class="table table-bordered table-striped table-hover table-employee" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th scope="col">NO</th>
                <th scope="col">NIK</th>
                <th scope="col">NAMA LENGKAP</th>
                <th scope="col">TEMPAT BEKERJA</th>
                <th scope="col">JABATAN</th>
                {{-- <th scope="col">GOLONGAN</th> --}}
                {{-- <th scope="col">GAJI POKOK</th> --}}
                <th colspan="3">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $key=>$employee)
            <tr>
                <td scope="row" style="vertical-align:middle;text-align:center">{{$key + 1}}</td>
                <td style="vertical-align:middle">{{$employee->nik}}</td>
                <td style="vertical-align:middle">{{$employee->nama_lengkap}}</td>
                <td style="vertical-align:middle">{{$employee->tempat_bekerja}}</td>
                <td style="vertical-align:middle">{{$employee->jabatan}}</td>
                {{-- <td style="vertical-align:middle;text-align:center">
                    {{$employee->salary_groups->nama_golongan}}
                </td> --}}
                {{-- <td style="vertical-align:middle;text-align:center">
                    Rp. {{number_format($employee->salary_groups->gaji_pokok,0,",",".")}}
                </td> --}}
                <td style="vertical-align:middle;width:10px">
                    <a href="/employees/{{$employee->nik}}" class="btn btn-secondary" 
                        style="height:30px;width:60px;padding:2px">Detail</a></td>
                <td style="vertical-align:middle;width:10px">
                    <a href="/employees/{{$employee->nik}}/edit" class="btn btn-primary" 
                        style="height:30px;width:60px;padding:2px">Edit</a>
                </td>
              
                <td style="vertical-align:middle;width:10px">
                    {!!Form::open(['action' => ['EmployeesController@destroy', $employee->nik], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                        'style' => "height:30px;width:60px;padding:2px;horizontal-align:middle"])}}
                    {!!Form::close()!!}
                </td>
                
            </tr>

            @endforeach

        </tbody>
    </table>
{{-- 
    Halaman : {{ $employees->currentPage() }} <br>
	Jumlah Data : {{ $employees->total() }} <br>
	Data Per Halaman : {{ $employees->perPage() }} <br> --}}
 
	<p>{{ $employees->links() }}</p>

@else
    <br><br>
    <p style="font-size:24px">Belum Ada Data</p>
@endif

@endsection

@section('scripts')
@parent
<script>
    $(document).ready(function() { $('.table-employee').DataTable( { dom: 'Bfrtip', buttons: [ 'copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5' ] } ); } );
</script>
@endsection