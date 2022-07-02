<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analyst extends Model
{
    use HasFactory;
     //Table Name
     protected $table = 'analyst';
     //Primary Key
     public $primaryKey = 'id';
     // //Timestamps
     public $timestamps = true;
}
