<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlergisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alergis', function (Blueprint $table) {
            $table->id();
            $table->integer('identitas_pasien_id');
            $table->boolean('status')->default(false);
            $table->text('reaksi_alergi')->default('-');
            $table->text('alergi')->default('-');
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
        Schema::dropIfExists('alergis');
    }
}
