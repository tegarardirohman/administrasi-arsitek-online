<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_detail_hasil_desain extends Model
{
    use HasFactory;

    protected $table = 'tb_detail_hasil_desain';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
