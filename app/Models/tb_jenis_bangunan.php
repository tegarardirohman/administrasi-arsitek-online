<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_jenis_bangunan extends Model
{
    use HasFactory;

    protected $table = 'tb_jenis_bangunan';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['nama_jenis'];

    public $timestamps = false;
}
