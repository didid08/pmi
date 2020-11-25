<?php

namespace App\Http\Controllers\User\Home\SubHome;

use App\Http\Controllers\User\Home\HomeController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends HomeController
{
    public $activeMenu = 'profile';
    public $subTitle = 'Profil Saya';

    public function viewPage ()
    {
        return $this->view('profile');
    }

    public function update($category, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email salah'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        /*User::updateOrCreate([
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
            'nik' => $request->input('nik'),
            'agama' => $request->input('agama'),
            'golongan_darah' => $request->input('golongan-darah'),
        ])*/

        return redirect()->back()->with('success', 'Data Anggota Berhasil Diperbarui');
    }
}
