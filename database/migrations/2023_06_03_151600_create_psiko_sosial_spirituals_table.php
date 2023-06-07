<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePsikoSosialSpiritualsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psiko_sosial_spirituals', function (Blueprint $table) {
            $table->id();
            $table->integer('identitas_pasien_id');
            $table->text('kebutuhan_kerohanian')->default("-");
            $table->text('kebutuhan_privasi_khusus')->default("-");
            $table->text('keyakinan_pelayanan_kesehatan')->default("-");
            $table->text('pola_interaksi')->default("-");
            $table->text('support_system')->default("-");
            $table->string('psikologis_status');
            $table->text('psikologis_dilaporkan')->default("-");
            $table->text('psikologis_lain_lain')->default("-");
            $table->text('psikologis_sebutkan')->default("-");
            $table->text('sosial_pola_interaksi')->default("-");
            $table->text('sosial_status_perkawinan')->default("-");
            $table->text('sosial_support_system')->default("-");
            $table->text('spiritual_agama')->default("-");
            $table->text('spiritual_kebutuhan_kerohanian')->default("-");
            $table->text('spiritual_kebutuhan_privasi_khusus')->default("-");
            $table->text('spiritual_keyakinan_pelayanan_kesehatan')->default("-");
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
        Schema::dropIfExists('psiko_sosial_spirituals');
    }
}
