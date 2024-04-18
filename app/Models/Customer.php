<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'tb_customer';
    protected $primaryKey = 'id_customer';
    public $timestamps = false;
    protected $fillable = [
        'nama_customer',
        'no_hp_customer',
        'email_customer'
    ];

    public function TransaksiCustomer(){
        return $this->hasMany(TransaksiCustomer::class, 'id_customer');
    }
}
