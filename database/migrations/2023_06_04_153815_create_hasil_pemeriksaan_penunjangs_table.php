<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilPemeriksaanPenunjangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_pemeriksaan_penunjangs', function (Blueprint $table) {
            $table->id();
            $table->integer('identitas_pasien_id');
            $table->text("laboratorium")->default("-");
            $table->text("rongent")->default("-");
            $table->text("lainnya")->default("-");
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
        Schema::dropIfExists('hasil_pemeriksaan_penunjangs');
    }
}
