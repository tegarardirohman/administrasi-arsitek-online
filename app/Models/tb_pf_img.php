<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_pf_img extends Model
{
    use HasFactory;
    protected $table = 'tb_pf_img';
    protected $primaryKey = 'pf_img_id';
    public $timestamp = false;
}
