<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class portofolio extends Model
{
    use HasFactory;

    protected $table = 'tb_portofolio';
    protected $primaryKey = 'pf_id';
    public $timestamp = false;


    public function pfImg(){
        return $this->hasMany(tb_pf_img::class, 'pf_img_id_portofolio', 'pf_id');
    }

}
