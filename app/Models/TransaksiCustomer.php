<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiCustomer extends Model
{
    use HasFactory;
    protected $table = 'tb_transaksi_customer';
    protected $primaryKey = 'id_transaksi_customer';
    public $timestamps = false;
    protected $fillable = [
        'id_customer',
        'id_barang',
        'id_pegawai',
        'id_transaksi',
        'jumlah_barang',
        'tanggal_transaksi',
        'total_harga'
    ];
    public function Customer(){
        return $this->belongsTo(Customer::class, 'id_customer');
    }
    public function Barang(){
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}

