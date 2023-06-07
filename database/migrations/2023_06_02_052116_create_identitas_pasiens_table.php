<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasPasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas_pasiens', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("no_rm");
            $table->string("tanggal_lahir");
            $table->text("diagnosa_medis");
            $table->string("ruang_rawat");
            $table->string("pendidikan");
            $table->string("tanggal_masuk");
            $table->string("tanggal_asesmen");
            $table->integer("user_id");
            $table->integer("assessment_job_id");
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
        Schema::dropIfExists('identitas_pasiens');
    }
}
