<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAnggota extends Model
{
    use HasFactory;

    protected $table = 'data_anggota';
    protected $fillable = [
        'user_id',
        'kode_anggota',
        'kode_anggota_lama',
        'nama',
        'kelamin',
        'no_hp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_identitas',
        'nik',
        'agama',
        'golongan_darah',

        'domisili_provinsi',
        'domisili_kabupaten_kota',
        'domisili_kecamatan',
        'domisili_desa_kelurahan',
        'domisili_alamat',
        'domisili_rt',
        'domisili_rw',
        'domisili_kode_pos',
        'domisili_no_telp',
        'domisili_status_kepemilikan',
        'domisili_status_tinggal',
        'domisili_catatan',
        'domisili_status_aktif',

        'identitas_provinsi',
        'identitas_kabupaten_kota',
        'identitas_kecamatan',
        'identitas_desa_kelurahan',
        'identitas_alamat',
        'identitas_rt',
        'identitas_rw',
        'identitas_kode_pos',
        'identitas_status_kepemilikan'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
