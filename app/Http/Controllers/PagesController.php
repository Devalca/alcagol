<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function welcome(){
        $title = 'Sistem Penggajian Guru dan Karyawan';
        return view('pages.welcome')->with('title', $title);
    }

    public function employees(){
        $title = 'Guru dan Karyawan';
        return view('employees.index')->with('title', $title);
    }

    public function slip_gaji(){
        return view('pages.slip_gaji');
    }

    // public function index(){
    //     return view('pages.index');
    // }

}
