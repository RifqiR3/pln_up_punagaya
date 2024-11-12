<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDriver extends Model
{
    use HasFactory;
    protected $table = 'data_driver';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'uuid',
        'nama',
        'plat_mobil'
    ];
}
