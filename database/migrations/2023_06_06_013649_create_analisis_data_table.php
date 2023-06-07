<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisisDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisis_data', function (Blueprint $table) {
            $table->id();
            $table->integer('identitas_pasien_id');
            $table->text('subjektif')->default("-");
            $table->text('objektif')->default("-");
            $table->text('penyebab')->default("-");
            $table->text('masalah')->default("-");
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
        Schema::dropIfExists('analisis_data');
    }
}
