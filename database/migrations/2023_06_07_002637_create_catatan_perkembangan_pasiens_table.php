<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatatanPerkembanganPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catatan_perkembangan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->integer("identitas_pasien_id");
            $table->string("tanggal");
            $table->text("implementasi");
            $table->text("soap_subjektif");
            $table->text("soap_objek");
            $table->text("soap_assessment");
            $table->text("soap_plan");
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
        Schema::dropIfExists('catatan_perkembangan_pasiens');
    }
}
