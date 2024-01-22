<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_relasi_layanan extends Model
{
    use HasFactory;

    protected $table = 'tb_relasi_layanan';
    protected $primaryKey = 'id';
    protected $fillable = ['id_layanan', 'id_layanan_item'];

    public $timestamps = false;
}
