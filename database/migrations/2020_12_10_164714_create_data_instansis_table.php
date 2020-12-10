<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataInstansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_instansi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('nama_instansi');
            $table->string('nama_kelompok_pmr');
            $table->string('alamat_instansi');
            $table->string('penanggung_jawab_pmr');
            $table->string('pembina_pmr');
            $table->string('jumlah_calon_anggota_pmr');
            $table->string('jumlah_siswa');
            $table->string('kepala_instansi');
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
        Schema::dropIfExists('data_instansi');
    }
}
