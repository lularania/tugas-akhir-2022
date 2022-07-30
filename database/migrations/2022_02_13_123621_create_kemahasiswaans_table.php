<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKemahasiswaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kemahasiswaans', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->string('nip')->unique();
            $table->string('nama');
            $table->string('jabatan');
            $table->foreignId('created_by')->nullable()->constrained('kemahasiswaans');
            $table->foreignId('updated_by')->nullable()->constrained('kemahasiswaans');
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
        Schema::dropIfExists('kemahasiswaans');
    }
}
