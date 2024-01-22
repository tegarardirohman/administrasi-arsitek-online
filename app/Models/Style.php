<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    use HasFactory;

    protected $table = 'style';
    protected $primaryKey = 'id_style';
    protected $fillable = ['nama_style', 'img_style'];

    public $timestamps = false;
}
