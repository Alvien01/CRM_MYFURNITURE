<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'tb_pegawai';
    protected $primaryKey = 'id_pegawai';
    public $timestamps = false;
    protected $fillable = [
        'nama_pegawai',
        'no_hp_pegawai',
        'email_pegawi'
    ];
    public function Pegawai(){
        return $this->hasMany(Pegawai::class, 'id_pegawai');
    }
}

