<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_layanan_item extends Model
{
    use HasFactory;

    protected $table = 'tb_layanan_item';
    protected $primaryKey = 'ly_item_id';
    protected $fillable = ['ly_item'];

    public $timestamps = false;

}
