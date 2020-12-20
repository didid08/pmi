<?php

namespace App\Http\Controllers\User\Home\SubHome;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\DataAnggota;

class ProfileController extends HomeController
{
    public $activeMenu = 'profile';
    public $subTitle = 'Profil';

    public function viewPage ()
    {
        return $this->view('profile');
    }

    public function updateDataAnggota (Request $request)
    {
        $dataAnggotaRealId = Auth::user()->dataAnggota->id;

        $validator = Validator::make($request->all(), [
            'kode-anggota' => 'required|numeric|unique:user_profiles,kode_anggota,'.$dataAnggotaRealId,
            'kode-anggota-lama' => 'required|numeric|unique:user_profiles,kode_anggota_lama,'.$dataAnggotaRealId,
            'nama' => 'required',
            'kelamin' => 'required',
            'no-hp' => 'required|numeric|unique:user_profiles,no_hp,'.$dataAnggotaRealId,
            'tempat-lahir' => 'required',
            'tanggal-lahir' => 'required|date',
            'jenis-identitas' => 'required',
            'nomor-induk-kependudukan' => 'required|numeric',
            'agama' => 'required',
            'golongan-darah' => 'required',
            'email' => 'required|email'
        ], [
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
            return redirect()->back()->withErrors($validator, 'data_anggota')->withInput();
        }

        User::updateOrCreate([
            'id' => Auth::id()
        ], [
            'email' => $request->input('email')
        ]);

        DataAnggota::updateOrCreate([
            'user_id' => Auth::id()
        ], [
            'kode_anggota' => $request->input('kode-anggota'),
            'kode_anggota_lama' => $request->input('kode-anggota-lama'),
            'nama' => $request->input('nama'),
            'kelamin' => $request->input('kelamin'),
            'no_hp' => $request->input('no-hp'),
            'tempat_lahir' => $request->input('tempat-lahir'),
            'tanggal_lahir' => $request->input('tanggal-lahir'),
            'jenis_identitas' => $request->input('jenis-identitas'),
            'nik' => $request->input('nomor-induk-kependudukan'),
            'agama' => $request->input('agama'),
            'golongan_darah' => $request->input('golongan-darah'),
        ]);

        return redirect()->back()->with('success', 'Data Anggota Berhasil Diperbarui');
    }

    public function updateDataInstansi (Request $request)
    {

    }
}
