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
        Schema::create('sdm', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('px_rajal_id');
            $table->string('parkir');
            $table->string('security');
            $table->string('dokter');
            $table->string('perawat');
            $table->string('radiologi');
            $table->string('laboratorium');

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
        Schema::dropIfExists('sdm');
    }
};
