@extends('layouts.app')

@section('content')
    <h1><b>Matrix Alternatif - Kriteria</b></h1>
        
    <hr>
    <a href="/score/create" class="btn btn-success" 
    style="height:40px;font-size:16px;margin:5px 0px 5px 0px">+ Tambah Data</a>

@if(count($score) > 0)
    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">Alternatif / Kriteria</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Kualitas Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Ketelitian Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Tanggung Jawab</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Profesionalisme</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Inisiatif</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Prilaku</th>
                <th class="col-2" colspan="2" style="vertical-align:middle">ACTION</th>
            </tr>
        </thead>

        <tbody>

            @foreach($score as $scores)
            
            <tr>
                <td style="vertical-align:middle;text-align:center">{{$scores->nama_lengkap}}</td>
                <td style="vertical-align:middle;text-align:center">{{$scores->k1}}</td>
                <td style="vertical-align:middle;text-align:center">{{$scores->k2}}</td>
                <td style="vertical-align:middle;text-align:center">{{$scores->k3}}</td>
                <td style="vertical-align:middle;text-align:center">{{$scores->k4}}</td>
                <td style="vertical-align:middle;text-align:center">{{$scores->k5}}</td>
                <td style="vertical-align:middle;text-align:center">{{$scores->k6}}</td>
                <th style="vertical-align:middle;text-align:center">
                    <a href="/score/{{$scores->nik}}/edit" class="btn btn-primary" 
                        style="height:28px;width:80px;padding:1px">
                        Edit</a></th>
                <th style="vertical-align:middle;width:10px;text-align:center">
                    {!!Form::open(['action' => ['ScoreController@destroy', $scores->nik], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Hapus', ['class' => 'btn btn-danger', 
                        'style' => "height:28px;width:80px;padding:1px;horizontal-align:middle"])}}
                    {!!Form::close()!!}
                </th>
            </tr>

            @endforeach

        </tbody>
    </table>

    <br><br>
    <h1><b>Nilai Min - Max Tiap Kriteria</b></h1>

    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">Alternatif / Kriteria</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Kualitas Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Ketelitian Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Tanggung Jawab</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Profesionalisme</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Inisiatif</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Prilaku</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td style="vertical-align:middle;text-align:center">Nilai Minimal</td>
                <td style="vertical-align:middle;text-align:center">{{$score->min('k1')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->min('k2')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->min('k3')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->min('k4')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->min('k5')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->min('k6')}}</td>
            </tr>
            <tr>
                <td style="vertical-align:middle;text-align:center">Nilai Maximal</td>
                <td style="vertical-align:middle;text-align:center">{{$score->max('k1')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->max('k2')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->max('k3')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->max('k4')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->max('k5')}}</td>
                <td style="vertical-align:middle;text-align:center">{{$score->max('k6')}}</td>
            </tr>
        </tbody>
    </table>

    <br><br>
    <h1><b>Matrix Ternormalisasi</b></h1>

    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">Alternatif / Kriteria</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Kualitas Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Ketelitian Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Tanggung Jawab</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Profesionalisme</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Inisiatif</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Prilaku</th>
                
            </tr>
        </thead>

        <tbody>
        @for ($a = 0; $a < $score->count(); $a++)
        <tr>
        <td style="vertical-align:middle;text-align:center">{{$score[$a]['nama_lengkap']}}</td>
            @for ($b = 0; $b < $analyst->count(); $b++)
                @if($analyst[$b]->cb == 'Benefit')
                    @php
                        $mt[$a][$b] = number_format((float)$score[$a]['k'.($b+1)]/$score->max('k'.($b+1)), 2, '.', '')
                    @endphp
                @else
                    @php
                        $mt[$a][$b] = number_format((float)$score->min('k'.($b+1))/$score[$a]['k'.($b+1)], 2, '.', '')
                    @endphp
                @endif
                <td style="vertical-align:middle;text-align:center">{{number_format((float)$mt[$a][$b], 2, '.', '')}}</td>
            @endfor
        </tr>
        @endfor
        </tbody>
    </table>

    <br><br>
    <h1><b>Matrix Terbobot</b></h1>

    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">Alternatif / Kriteria</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Kualitas Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Ketelitian Kerja</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Tanggung Jawab</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Profesionalisme</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Inisiatif</th>
                <th class="col-1" scope="col" style="vertical-align:middle">Prilaku</th>
                
            </tr>
        </thead>

        <tbody>
        @for ($a = 0; $a < $score->count(); $a++)
        <tr>
        <td style="vertical-align:middle;text-align:center">{{$score[$a]['nama_lengkap']}}</td>
            @for ($b = 0; $b < $analyst->count(); $b++)
                @php
                $mtb[$a][$b] = $mt[$a][$b]*$analyst[$b]->bobot
                @endphp
                <td style="vertical-align:middle;text-align:center">{{number_format((float)$mtb[$a][$b], 2, '.', '')}}</td>
            @endfor
        </tr>
        @endfor
        </tbody>
    </table>

    <br><br>
    <h1><b>Hasil Akhir</b></h1>

    <table class="table table-bordered table-striped table-hover" style="margin:10px 0px;font-size:16px">
        <thead class="thead-dark">
            <tr style="text-align:center">
                <th class="col-2" scope="col" style="vertical-align:middle">Alternatif / Kriteria</th>
                <th class="col-1" scope="col" style="vertical-align:middle">V</th>
            </tr>
        </thead>

        <tbody>
        @for ($a = 0; $a < $score->count(); $a++)
        <tr>
        <td style="vertical-align:middle;text-align:center">{{$score[$a]['nama_lengkap']}}</td>
            @php
            $v[$a][0] = 0
            @endphp
                @for ($b = 0; $b < $analyst->count(); $b++)
                    @php
                        $v[$a][0] = $v[$a][0] + $mtb[$a][$b]
                    @endphp
                @endfor
            <td style="vertical-align:middle;text-align:center">{{number_format((float)$v[$a][0], 2, '.', '')}}</td>

        </tr>
        @endfor
        </tbody>
    </table>
    <hr>
    <p>Di bawah ini adalah list golongan dari hasil kesimpulan di atas<p>
    <p>0.8-1 poin merupakan golongan A<p>
    <p>0.5-7 poin merupakan golongan B<p>
    <p>0.1-4 poin merupakan golongan C<p>
    
    <p>{{ $score->links() }}</p>

@else
    <br><br>
    <p style="font-size:24px">Belum Ada Data</p>
@endif

@endsection