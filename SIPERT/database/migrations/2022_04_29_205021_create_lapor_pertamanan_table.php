<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapor_pertamanan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user')->nullable();
            $table->string('judul');
            $table->string('Isi_Keluhan');
            $table->string('Choose_File');
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
        Schema::dropIfExists('lapor_pertamanan');
    }
};
