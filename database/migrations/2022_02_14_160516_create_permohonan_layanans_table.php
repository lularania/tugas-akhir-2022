<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonan_layanans', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_mahasiswa')->nullable()->constrained('mahasiswas');
            $table->foreignId('id_layanan')->nullable()->constrained('jenis_layanan');
            $table->foreignId('id_status')->nullable()->constrained('statuses');
            $table->string('jenis_penanganan')->nullable();
            $table->string('judul_keluhan');
            $table->string('deskripsi_keluhan')->nullable();
            $table->string('catatan')->nullable();
            $table->string('berkas');
            $table->foreignId('created_by')->nullable()->constrained('mahasiswas');
            $table->foreignId('updated_by')->nullable()->constrained('kemahasiswaans');
            $table->foreignId('updated_by_tenaga_kesehatan')->nullable()->constrained('tenaga_kesehatans');
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
        Schema::dropIfExists('permohonan_layanans');
    }
}
