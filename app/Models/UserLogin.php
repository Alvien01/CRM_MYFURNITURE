<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    use HasFactory;
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = [
        'nama_user',
        'no_hp_user',
        'email',
        'username',
        'password'
    ];
}
