<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;

    protected $table = 'tb_pembayaran';
    protected $primaryKey = 'pby_id';

    public $timestamps = false;
}
