<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformasiKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informasi_kesehatan', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_tenaga_kesehatan')->nullable()->constrained('tenaga_kesehatans');
            $table->foreignId('id_status')->nullable()->constrained('statuses');
            $table->string('judul');
            $table->string('deskripsi', 2000);
            $table->string('gambar');
            $table->string('sumber');
            $table->foreignId('created_by')->nullable()->constrained('pengurus_ukm_tekkes');
            $table->foreignId('updated_by')->nullable()->constrained('pengurus_ukm_tekkes');
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
        Schema::dropIfExists('informasi_kesehatan');
    }
}
