<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'data_role';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'role'
    ];
}
