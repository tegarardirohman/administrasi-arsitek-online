<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_akun extends Model
{
    use HasFactory;

    protected $table = 'tb_akun';
    protected $primaryKey = 'akun_id';

    public $timestamps = false;

    protected $fillable = ['email', 'password', 'nama', 'gender', 'telp', 'alamat', 'img', 'level'];

}
