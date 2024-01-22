<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proyek_style extends Model
{
    use HasFactory;

    protected $table = 'proyek_style';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable = ['id_proyek', 'id_style'];

}
