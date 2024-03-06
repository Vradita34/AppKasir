<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekapsuara extends Model
{
    use HasFactory;

    protected $table = "rekapsuara";

    protected $fillable  = ['total_33', 'total_sah_33', 'total_tidaksah_33', 'suara_no1', 'suara_no2', 'suara_no3', 'nama_tps'];
}
