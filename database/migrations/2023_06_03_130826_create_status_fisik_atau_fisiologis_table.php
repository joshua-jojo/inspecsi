<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusFisikAtauFisiologisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_fisik_atau_fisiologis', function (Blueprint $table) {
            $table->id();
            $table->integer("identitas_pasien_id");
            $table->boolean("batuk")->default(false);
            $table->text("batuk_lama_sakit")->nullable();
            $table->boolean("sesak_nafas")->default(false);
            $table->text("sesak_nafas_keterangan")->nullable();
            $table->boolean("penggunaan_alat_bantu_nafas")->default(false);
            $table->boolean("sputum")->default(false);
            $table->text("sputum_jenis_sputum")->nullable();
            $table->text("akral")->default('-');
            $table->text("crt")->default('-');
            $table->text("nadi")->default('-');
            $table->text("pernapasan")->default('-');
            $table->text("spo2")->default('-');
            $table->text("suhu")->default('-');
            $table->text("tekanan_darah")->default('-');
            $table->string("reproduksi_dan_seksualitas")->default("tidak ada gangguan");
            $table->text("reproduksi_dan_seksualitas_gangguan")->nullable();
            $table->integer("bb")->default(0);
            $table->integer("tb")->default(0);
            $table->integer("imt")->default(0);
            $table->boolean("edema")->default(false);
            $table->text("edema_keterangan")->nullable();
            $table->text("kebutuhan_nutrisi")->default("-");
            $table->text("kesulitan_minum")->default("-");
            $table->text("status_puasa")->default("-");
            $table->text("turgor_kulit")->default("-");
            $table->boolean("muntah")->default(false);
            $table->text("muntah_keterangan")->nullable();
            $table->text("kesadaran")->nullable();
            $table->text("bab_status")->default("-");
            $table->text("bab_frequensi_diare")->default("-");
            $table->text("bab_konsistensi")->default("-");
            $table->text("bab_warna")->default("-");
            $table->text("bak_status")->default("-");
            $table->text("aktifitas_durasi")->default("-");
            $table->text("aktifitas_pola_tidur")->default("-");
            $table->boolean("tidur_status")->default(false);
            $table->text("tidur_gangguan")->default("-");
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
        Schema::dropIfExists('status_fisik_atau_fisiologis');
    }
}
