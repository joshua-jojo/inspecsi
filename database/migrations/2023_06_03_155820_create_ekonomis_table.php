<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEkonomisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ekonomis', function (Blueprint $table) {
            $table->id();
            $table->integer('identitas_pasien_id');
            $table->text('pembiayaan_kesehatan')->default("-");
            $table->text('penanggung_jawab_pasien')->default("-");
            $table->text('status_pekerjaaan')->default("-");
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
        Schema::dropIfExists('ekonomis');
    }
}
