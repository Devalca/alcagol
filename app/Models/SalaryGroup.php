<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryGroup extends Model
{
    use HasFactory;

    //Table Name
    protected $table = 'salary_groups';
    //Primary Key
    public $primaryKey = 'id_golongan';
    // //Timestamps
    public $timestamps = true;

    protected $guarded = [];
}
