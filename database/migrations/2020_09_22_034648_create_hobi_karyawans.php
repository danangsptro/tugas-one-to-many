<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHobiKaryawans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobi_karyawans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('karyawan_id')->unsigned()->index();
            $table->bigInteger('hobi_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('hobi_id')->references('id')->on('hobi_manies')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobi_karyawans');
    }
}
