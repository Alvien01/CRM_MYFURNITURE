<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiConsumer extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi_konsumen';
    protected $primaryKey = 'id_transaksi_konsumen';
    public $timestamps = false;
    protected $fillable = [
        'id_konsumen',
        'id_pegawai',
        'id_barang',
        'id_transaksi',
        'jumlah_barang',
        'tanggal_transaksi',
        'total_harga'
    ];
    public function Konsumen(){
        return $this->belongsTo(Konsumen::class, 'id_konsumen');
    }
    public function Barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
