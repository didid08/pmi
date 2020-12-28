<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'user/home/profile/data-anggota/update',
        'user/home/manajemen-user/anggota/tambah',
        'user/home/manajemen-user/anggota/perbarui',
        'user/home/manajemen-user/anggota/hapus',

        'user/home/manajemen-user/instansi/tambah',
        'user/home/manajemen-user/instansi/perbarui',
        'user/home/manajemen-user/instansi/hapus',

        'user/home/manajemen-user/admin/tambah',
        'user/home/manajemen-user/admin/perbarui',
        'user/home/manajemen-user/admin/hapus'
    ];
}
