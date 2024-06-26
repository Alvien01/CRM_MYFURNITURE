<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;
    protected $fillable = [
        'nama_transaksi',
        'jenis_transaksi'
    ];
}
