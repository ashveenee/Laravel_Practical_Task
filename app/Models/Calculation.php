<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculation extends Model
{
    use HasFactory;

    protected $table = 'calculation';
    protected $primaryKey = 'id';
    public $timestamps = false;


    protected $fillable = [
        'id', 'name','is_admin','principle','rate','time','interest'
    ];

   
}
