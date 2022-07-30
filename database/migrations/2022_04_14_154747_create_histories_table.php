<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_permohonan')->nullable()->constrained('permohonan_layanans');
            $table->foreignId('id_kemahasiswaan')->nullable()->constrained('kemahasiswaans');
            $table->foreignId('id_tenaga_kesehatan')->nullable()->constrained('tenaga_kesehatans');
            $table->foreignId('id_status')->nullable()->constrained('statuses');
            $table->string('jenis_penanganan')->nullable();
            $table->string('alasan')->nullable();
            $table->string('feedback')->nullable();
            $table->string('penanganan')->nullable();
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
        Schema::dropIfExists('histories');
    }
}
