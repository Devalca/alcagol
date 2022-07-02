<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //Table Name
    protected $table = 'employees';
    //Primary Key
    public $primaryKey = 'nik';
    // //Timestamps
    public $timestamps = true;

    // public function golongans(){
    //     return $this->belongsTo(Golongan::class,'golongan_id');
    // }

    public function salary_groups(){
        return $this->belongsTo(SalaryGroup::class,'id_golongan');
    }
}
