@extends('layouts.app')
<?php
use App\Models\Employee;
?>
@section('content')
    <div class="container">
    <div class="row" style="font-size:24px">
            <div class="card shadow mb-5 bg-body" style="width:28rem;border:2px solid;float:right">
                <div class="card-header" style="font-size:32px;background:#ffcbcb;font-family:Cambria"><b>{{ __('DASHBOARD') }}</b></div> 
                    <div class="card-body">
                        <?php date_default_timezone_set('Asia/Jakarta');

                        // 24-hour format of an hour without leading zeros (0 through 23)
                        $Hour = date('G');
                        
                        if ( $Hour >= 5 && $Hour <= 10 ) {
                            echo "Selamat Pagi, ". Auth::user()->name;
                        } else if ( $Hour >= 10 && $Hour <= 14 ) {
                            echo "Selamat Siang, ". Auth::user()->name;
                        } else if ( $Hour >= 14 || $Hour <= 17 ) {
                            echo "Selamat Sore, ". Auth::user()->name;
                        } else if ( $Hour >= 17 || $Hour <= 5 ) {
                            echo "Selamat Malam, ". Auth::user()->name;
                        } ?>
                    </div>
                </div>
                <div class="card shadow mb-5 bg-body" style="width:32rem;text-align:right;border:2px solid;margin-left:9rem">
                    <div class="card-header" style="font-size:32px;background:#c4ecff;font-family:Cambria"><b>{{ __('WAKTU SAAT INI') }}</b></div> 
                        <div class="card-body" style="font-size:24px">
                            <?php 
                            date_default_timezone_set('Asia/Jakarta');
                            Carbon\Carbon::setLocale('id');
                            $dt = Carbon\Carbon::now()->isoFormat('dddd, DD MMMM Y, HH:mm');
                            echo $dt;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <h1 style="font-family:Riffic;font-size:40px">GURU DAN KARYAWAN</h1>
        <hr>
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="card shadow" style="background-color:#6fff6f;width:24%;height:10rem;border:2px solid;margin-right:5px;border-radius:5px">
              <div class="card-body">
                <h2 class="card-title" style="font-size:33px;font-color:dark;font-family: Exotc350 Bd BT">SEKRETARIAT</h2>
                <p class="card-text" style="font-size:20px">
                <?php
                  $count = Employee::where('tempat_bekerja', '=', 'sekretariat')->count();
                  echo $count ;
                ?> orang</p>
              </div>
              <a href="employees/sekre" class="card-footer" style="color:black;height:46px;font-family:Papyrus;font-size:16px;text-align:center;background:#65fa65">Lihat selengkapnya</a>
            </div>
            <div class="card shadow" style="background-color:#fcff34;width:18%;height:10rem;border:2px solid;margin:0px 5px;border-radius:5px">
              <div class="card-body">
                <h2 class="card-title" style="font-size:33px;font-color:dark;font-family: Exotc350 Bd BT">TK</h2>
                <p class="card-text" style="font-size:18px">
                <?php
                  $count = Employee::where('tempat_bekerja', '=', 'tk')->count();
                  echo $count ;
                ?> orang</p>
              </div>
              <a href="employees/tk" class="card-footer" style="color:black;height:46px;font-family:Papyrus;font-size:16px;text-align:center;background:#f0f32e">Lihat selengkapnya</a>
            </div>
            <!-- ./col -->
            <div class="card shadow bg-danger" style="width:18%;height:10rem;border:2px solid;margin:0px 5px;border-radius:5px">
              <div class="card-body">
                <h2 class="card-title" style="font-size:33px;font-color:dark;font-family: Exotc350 Bd BT">SD</h2>
                <p class="card-text" style="font-size:18px">
                <?php
                  $count = Employee::where('tempat_bekerja', '=', 'sd')->count();
                  echo $count ;
                ?> orang</p>
              </div>
              <a href="employees/sd" class="card-footer" style="color:white;height:46px;font-family:Papyrus;font-size:16px;text-align:center">Lihat selengkapnya</a>
            </div>
            <!-- ./col -->
            <div class="card shadow bg-info" style="width:18%;height:10rem;border:2px solid;margin:0px 5px;border-radius:5px">
              <div class="card-body">
                <h2 class="card-title" style="font-size:33px;font-color:dark;font-family: Exotc350 Bd BT">SMP</h2>
                <p class="card-text" style="font-size:18px">
                <?php
                  $count = Employee::where('tempat_bekerja', '=', 'smp')->count();
                  echo $count ;
                ?> orang</p>
              </div>
              <a href="employees/smp" class="card-footer" style="color:white;height:46px;font-family:Papyrus;font-size:16px;text-align:center">Lihat selengkapnya</a>
            </div>
            <!-- ./col -->
            <div class="card shadow" style="background-color:#aeaeae;width:18%;height:10rem;border:2px solid;margin-left:5px;border-radius:5px">
              <div class="card-body">
                <h2 class="card-title" style="font-size:33px;color:black;font-family: Exotc350 Bd BT">SMA</h2>
                <p class="card-text" style="font-size:18px">
                <?php
                  $count = Employee::where('tempat_bekerja', '=', 'sma')->count();
                  echo $count ;
                ?> orang</p>
              </div>
              <a href="employees/sma" class="card-footer" style="color:white;height:46px;font-family:Papyrus;font-size:16px;text-align:center;background:rgb(162, 162, 162)">Lihat selengkapnya</a>
          </div>
            <!-- ./col -->
            <a href="/employees" class="btn btn-outline-dark" 
            style="height:40px;width:100%;font-size:18px;margin-top:18px">Lihat semua Guru dan Karyawan</a>
          </div>
        </div>
      </div>
    </div>
@endsection