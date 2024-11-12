<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataMobilDinas extends Model
{
    protected $table = 'data_mobil_dinas';
    protected $fillable = [
        'uuid',
        'user_uuid',
        'nama',
        'nip',
        'maksud',
        'tujuan_provinsi',
        'tujuan_kota',
        'tanggal_mulai',
        'tanggal_selesai',
        'driver_uuid',
        'status_konfirmasi'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_uuid', 'uuid');
    }

    public function driver()
    {
        return $this->belongsTo(DataDriver::class, 'driver_uuid', 'uuid');
    }
}
