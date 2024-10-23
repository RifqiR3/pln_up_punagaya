<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $table = 'data_user';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'uuid',
        'nama',
        'email',
        'password',
        'foto',
        'role'
    ];
}
