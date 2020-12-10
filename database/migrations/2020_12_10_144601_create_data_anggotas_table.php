<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataAnggotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_anggota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('foto')->nullable();
            $table->string('kode_anggota')->nullable();
            $table->string('kode_anggota_lama')->nullable();
            $table->string('nama')->nullable();
            $table->string('kelamin')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_identitas')->nullable();
            $table->string('nik')->nullable();
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'])->nullable();
            $table->enum('golongan_darah', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();

            $table->string('domisili_provinsi')->nullable();
            $table->string('domisili_kabupaten_kota')->nullable();
            $table->string('domisili_kecamatan')->nullable();
            $table->string('domisili_desa_kelurahan')->nullable();
            $table->string('domisili_alamat')->nullable();
            $table->string('domisili_rt')->nullable();
            $table->string('domisili_rw')->nullable();
            $table->string('domisili_kode_pos')->nullable();
            $table->string('domisili_nomor_telepon')->nullable();
            $table->string('domisili_status_kepemilikan')->nullable();
            $table->string('domisili_status_tinggal')->nullable();
            $table->string('domisili_catatan')->nullable();
            $table->string('domisili_status_aktif')->nullable();

            $table->string('identitas_provinsi')->nullable();
            $table->string('identitas_kabupaten_kota')->nullable();
            $table->string('identitas_kecamatan')->nullable();
            $table->string('identitas_desa_kelurahan')->nullable();
            $table->string('identitas_alamat')->nullable();
            $table->string('identitas_rt')->nullable();
            $table->string('identitas_rw')->nullable();
            $table->string('identitas_kode_pos')->nullable();
            $table->string('identitas_status_kepemilikan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_anggota');
    }
}
