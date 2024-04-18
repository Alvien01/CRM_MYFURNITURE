<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    use HasFactory;
    protected $table = 'tb_distributor';
    protected $primaryKey = 'id_distributor';
    public $timestamps = false;
    protected $fillable = [
        'nama_distributor',
        'no_hp_distributor',
        'email_distributor'
    ];
}
