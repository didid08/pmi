<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    /*protected $attributes = [
        'kode_anggota' => '-',
        'kode_anggota_lama' => '-',
        'nama' => '-',
        'kelamin' => '-',
        'no_hp' => '-',
        'tempat_lahir' => '-',
        'tanggal_lahir' => '-',
        'jenis_identitas' => '-',
        'nik' => '-',
        'agama' => '-',
        'golongan_darah' => '-',
    ];*/

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
