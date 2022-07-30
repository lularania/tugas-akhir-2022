<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenagaKesehatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenaga_kesehatans', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->string('nama_tenaga_kesehatan');
            $table->string('foto_tenaga_kesehatan');
            $table->string('jabatan_tenaga_kesehatan');
            $table->text('link_meeting')->nullable();
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
        Schema::dropIfExists('tenaga_kesehatans');
    }
}
