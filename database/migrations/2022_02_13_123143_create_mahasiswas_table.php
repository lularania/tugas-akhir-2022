<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->foreignId('id_role')->default('2');
            $table->string('prodi');
            $table->string('nrp');
            $table->string('nama');
            $table->string('angkatan');
            $table->string('kelas');
            $table->string('alamat');
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
        Schema::dropIfExists('mahasiswas');
    }
}
