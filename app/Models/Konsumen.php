<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    use HasFactory;
    protected $table = 'tb_consumer';
    protected $primaryKey = 'id_konsumen';
    public $timestamps = false;
    protected $fillable = [
        'nama_konsumen',
        'no_hp_konsumen',
        'email_konsumen'
    ];
    public function TransaksiConsumer(){
        return $this->hasMany(TransaksiConsumer::class, 'id_konsumen');
    }

    public function Poin(){
        return $this->hasMany(Poin::class, 'id_konsumen');
    }
}

