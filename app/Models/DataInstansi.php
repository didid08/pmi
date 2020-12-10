<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInstansi extends Model
{
    use HasFactory;

    protected $table = 'data_instansi';
    protected $fillable = [
        'user_id',
        'nama_kelompok_pmr',
        'alamat_instansi',
        'penanggung_jawab_pmr',
        'pembina_pmr',
        'jumlah_calon_anggota_pmr',
        'jumlah_siswa'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
