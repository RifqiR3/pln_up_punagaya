<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSppd extends Model
{
    protected $table = 'data_sppd';
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
        'surat_undangan',
        'status',
        'catatan'
    ];

    public function user()
    {
        return $this->belongsTo(Users::class, 'user_uuid', 'uuid');
    }
}