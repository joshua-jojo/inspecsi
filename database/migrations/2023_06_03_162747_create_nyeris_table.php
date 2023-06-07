<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNyerisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nyeris', function (Blueprint $table) {
            $table->id();
            $table->integer('identitas_pasien_id');
            $table->boolean("status")->default(false);
            $table->text("durasi")->default("-");
            $table->text("faktor")->default("-");
            $table->text("kapan")->default("-");
            $table->text("karakteristik")->default("-");
            $table->text("lokasi")->default("-");
            $table->text("skala")->default("-");
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
        Schema::dropIfExists('nyeris');
    }
}
