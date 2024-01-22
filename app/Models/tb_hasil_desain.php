<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_hasil_desain extends Model
{
    use HasFactory;

    protected $table = 'tb_hasil_desain';
    protected $primaryKey = 'desain_id';

    public $timestamps = false;

    public function detail(){
        return $this->hasMany(tb_detail_hasil_desain::class, 'id_hasil_desain', 'desain_id');
    }

}
