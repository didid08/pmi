<?php

namespace App\Http\Controllers\User\Home\SubHome;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\DataAnggota;
use App\Models\DataInstansi;

class UserManagementController extends HomeController
{
    public $activeMenu = 'manajemen-user';
    public $subTitle = 'Manajemen User';

    public function viewPage ()
    {
        return $this->view('user-management', [
            'semuaAnggota' => User::where('role', '1')->get(),
            'semuaInstansi' => User::where('role', '2')->get(),
            'semuaModerator' => User::where('role', '3')->get(),
            'semuaAdmin' => User::where('role', '4')->get()
        ]);
    }

    public function tambahAnggota (Request $request) 
    {
        $validatorRules = [
            'kode-anggota' => 'required|numeric|unique:data_anggota,kode_anggota',
            'nama' => 'required',
            'kelamin' => 'required',
            'no-hp' => 'required|numeric|unique:data_anggota,no_hp',
            'tempat-lahir' => 'required',
            'tanggal-lahir' => 'required|date',
            'jenis-identitas' => 'required',
            'nomor-induk-kependudukan' => 'required|numeric',
            'agama' => 'required',
            'golongan-darah' => 'required',
            'email' => 'required|email|unique:users,email'
        ];

        // Optional Input
        if (!empty($request->input('kode-anggota-lama'))) {
            $validatorRules['kode-anggota-lama'] = 'numeric|unique:data_anggota,kode_anggota_lama';
        }

        $validator = Validator::make($request->all(), $validatorRules, [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus berbentuk angka',
            'unique' => 'Terdapat user dengan :attribute yang sama',
            'tanggal-lahir.date' => 'Format tanggal lahir salah',
            'email.email' => 'Format email salah'
        ], [
            'kode-anggota' => 'Kode anggota',
            'kode-anggota-lama' => 'Kode anggota lama',
            'nama' => 'Nama',
            'kelamin' => 'Jenis kelamin',
            'no-hp' => 'Nomor ponsel',
            'tempat-lahir' => 'Tempat lahir',
            'tanggal-lahir' => 'Tanggal lahir',
            'jenis-identitas' => 'Jenis identitas',
            'nomor-induk-kependudukan' => 'Nomor induk kependudukan',
            'agama' => 'Agama',
            'golongan-darah' => 'Golongan darah',
            'email' => 'Email'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'tambah_anggota')->withInput();
        }
        /// End Validation

        $dataAnggota = [
            'kode_anggota' => $request->input('kode-anggota'),
            'nama' => $request->input('nama'),
            'kelamin' => $request->input('kelamin'),
            'no_hp' => $request->input('no-hp'),
            'tempat_lahir' => $request->input('tempat-lahir'),
            'tanggal_lahir' => $request->input('tanggal-lahir'),
            'jenis_identitas' => $request->input('jenis-identitas'),
            'nik' => $request->input('nomor-induk-kependudukan'),
            'agama' => $request->input('agama'),
            'golongan_darah' => $request->input('golongan-darah'),
        ];

        // Optional Input to add
        if (!empty($request->input('kode-anggota-lama'))) {
            $dataAnggota['kode_anggota_lama'] = $request->input('kode-anggota-lama');
        }

        $domisili = [
            'provinsi',
            'kabupaten-kota',
            'kecamatan',
            'desa-kelurahan',
            'alamat',
            'rt',
            'rw',
            'kode-pos',
            'no-telp',
            'status-kepemilikan',
            'status-tinggal',
            'catatan',
            'status-aktif'
        ];
        $identitas = [
            'provinsi',
            'kabupaten-kota',
            'kecamatan',
            'desa-kelurahan',
            'alamat',
            'rt',
            'rw',
            'kode-pos',
            'status-kepemilikan'
        ];

        foreach ($domisili as $x) {
            if (!empty($request->input('domisili-'.$x))) {
                $dataAnggota['domisili_'.str_replace('-', '_', $x)] = $request->input('domisili-'.$x);
            }
        }
        foreach ($identitas as $y) {
            if (!empty($request->input('identitas-'.$y))) {
                $dataAnggota['identitas_'.str_replace('-', '_', $y)] = $request->input('identitas-'.$y);
            }
        }

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('email')),
            'role' => '1'
        ]);
        $user->dataAnggota()->create($dataAnggota);

        return redirect()->back()->with('success', 'Anggota berhasil ditambahkan');
    }

    public function tambahInstansi (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama-instansi' => 'required',
            'nomor-kelompok-pmr' => 'required|numeric',
            'alamat-instansi' => 'required',
            'penanggung-jawab-pmr' => 'required',
            'pembina-pmr' => 'required',
            'jumlah-calon-anggota-pmr' => 'required|numeric',
            'jumlah-siswa' => 'required|numeric',
            'kepala-instansi' => 'required',
            'email' => 'required|email|unique:users,email'
        ], [
            'required' => ':attribute tidak boleh kosong',
            'numeric' => ':attribute harus berbentuk angka',
            'unique' => 'Terdapat user dengan :attribute yang sama',
            'email.email' => 'Format email salah'
        ], [
            'nama-instansi' => 'Nama Instansi',
            'nomor-kelompok-pmr' => 'Nomor Kelompok PMR',
            'alamat-instansi' => 'Alamat Instansi',
            'penanggung-jawab-pmr' => 'Penanggung Jawab PMR',
            'pembina-pmr' => 'Pembina PMR',
            'jumlah-calon-anggota-pmr' => 'Jumlah Calon Anggota PMR',
            'jumlah-siswa' => 'Jumlah Siswa',
            'kepala-instansi' => 'Kepala Instansi',
            'email' => 'Email',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, 'tambah_instansi')->withInput();
        }

        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('email')),
            'role' => '2'
        ]);
        $user->dataInstansi()->create([
            'nama_instansi' => $request->input('nama-instansi'),
            'nomor_kelompok_pmr' => $request->input('nomor-kelompok-pmr'),
            'alamat_instansi' => $request->input('alamat-instansi'),
            'penanggung_jawab_pmr' => $request->input('penanggung-jawab-pmr'),
            'pembina_pmr' => $request->input('pembina-pmr'),
            'jumlah_calon_anggota_pmr' => $request->input('jumlah-calon-anggota-pmr'),
            'jumlah_siswa' => $request->input('jumlah-siswa'),
            'kepala_instansi' => $request->input('kepala-instansi'),
        ]);

        return redirect()->back()->with('success', 'Instansi berhasil ditambahkan');
    }

    public function hapusUser($userId, Request $request)
    {
        User::where('id', $userId)->delete();
        return redirect()->back()->with('success', 'Berhasil menghapus user');
    }
}
