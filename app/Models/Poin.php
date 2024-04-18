<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poin extends Model
{
    use HasFactory;
    protected $table = 'tb_poin';
    protected $primaryKey = 'id_poin';
    public $timestamps = false;
    protected $fillable = [
        'id_konsumen',
        'jumlah_poin',
    ];
    public function Konsumen(){
        return $this->belongsTo(Konsumen::class, 'id_konsumen');
    }
    // public function Poin(){
    //     return $this->belongsTo(Konsumen::class, 'id_konsumen');
    // }
}
