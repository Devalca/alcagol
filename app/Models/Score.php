<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
     //Table Name
     protected $table = 'score';
     //Primary Key
     public $primaryKey = 'nik';
     // //Timestamps
     public $timestamps = true;

     public function employees(){
        return $this->belongsTo(Employee::class,'nik');
    }

    public function analysts(){
        return $this->belongsTo(Analyst::class,'id');
    }
}
