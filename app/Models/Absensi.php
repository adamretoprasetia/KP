<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'Absensi';

    public function Absensi() {

    	return $this->belongsTo('App\Models\Absensi');

    }


}