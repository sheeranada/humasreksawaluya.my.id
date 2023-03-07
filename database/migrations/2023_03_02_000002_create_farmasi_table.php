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
        Schema::create('farmasi', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('px_rajal_id');
            $table->string('kecepatan');
            $table->string('sikap_petugas');
            $table->string('penjelasan_obat');
            $table->string('pelayanan_farmasi');

            $table->index('px_rajal_id');

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
        Schema::dropIfExists('farmasi');
    }
};
