<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;

    protected $table = 'kota_kab';
    protected $primaryKey = 'id_kota';
    protected $fillable = ['nama_kota'];

    public $timestamps = false;
}
