<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusUKMTekkesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus_ukm_tekkes', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->string('nrp')->unique();
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
        Schema::dropIfExists('pengurus_ukm_tekkes');
    }
}
