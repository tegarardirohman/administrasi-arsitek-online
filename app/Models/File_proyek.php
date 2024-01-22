<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_proyek extends Model
{
    use HasFactory;

    protected $table = 'file_proyek';
    protected $primaryKey = 'id';
    protected $fillable = ['id_proyek_file', 'file'];

    public $timestamps = false;

}
