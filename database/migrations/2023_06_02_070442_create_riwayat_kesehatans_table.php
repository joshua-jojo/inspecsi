<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatKesehatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_kesehatans', function (Blueprint $table) {
            $table->id();
            $table->integer("identitas_pasien_id");
            $table->string("keluhan_utama");
            $table->string("riwayat_kesehatan_sekarang");
            $table->boolean("penyakit_genetik")->default(false);
            $table->text("penyakit_genetik_keterangan")->nullable();
            $table->text("penyakit_genetik_sejak_kapan")->nullable();
            $table->boolean("trauma")->default(false);
            $table->boolean("operasi")->default(false);
            $table->boolean("lainnya")->default(false);
            $table->text("lainnya_penyakit")->nullable();
            $table->text("lainnya_kapan")->nullable();
            $table->text("riwayat_kesehatan_keluarga")->nullable();
            $table->boolean("auto_anamnesa")->default(true);
            $table->text("pemberi_informasi")->nullable();
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
        Schema::dropIfExists('riwayat_kesehatans');
    }
}
