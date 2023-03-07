<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('px_rajal', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('no_upf');
            $table->integer('no_rm');
            $table->string('nama_pasien');
            $table->string('klinik');
            $table->string('penjamin');
            $table->string('no_hp');
            $table->dateTime('tgl_daftar');
            $table->string('kategori_pasien');

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
        Schema::dropIfExists('px_rajal');
    }
};
