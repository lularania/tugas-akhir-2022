<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsikologsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psikologs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_tenaga_kesehatans')->nullable()->constrained('tenaga_kesehatans');
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
        Schema::dropIfExists('psikologs');
    }
}
