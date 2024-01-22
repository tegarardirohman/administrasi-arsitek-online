<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_proyek extends Model
{
    use HasFactory;
    protected $table = 'tb_proyek';
    protected $primaryKey = 'pry_id';
    protected $fillable = ['pry_nama', 'pry_jenis_bangunan', 'pry_panjang', 'pry_lebar', 'pry_lantai', 'pry_luas', 'pry_ly_id', 'pry_id_akun', 'pry_total', 'pry_catatan', 'pry_status'];

    public $timestamps = false;

    public function file(){
        return $this->belongsTo(File_proyek::class, 'id_proyek', 'pry_id');
    }

    public function alamat(){
        return $this->belongsTo(kota::class, 'pry_alamat', 'id_kota');
    }
}
