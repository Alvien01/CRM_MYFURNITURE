<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'tb_barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    protected $fillable = [
        'nama_barang',
        'jenis_barang',
        'harga_barang',
        'stock',
        'id_distributor'
    ];
    public function Distributor(){
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }
    
    public function TransaksiConsumer(){
        return $this->hasMany(TransaksiConsumer::class, 'id_barang');
    }
    public function TransaksiCustomer(){
        return $this->hasMany(TransaksiCustomer::class, 'id_barang');
    }
}
