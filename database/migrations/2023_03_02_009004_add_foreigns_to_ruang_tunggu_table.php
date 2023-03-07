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
        Schema::table('ruang_tunggu', function (Blueprint $table) {
            $table
                ->foreign('px_rajal_id')
                ->references('id')
                ->on('px_rajal')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ruang_tunggu', function (Blueprint $table) {
            $table->dropForeign(['px_rajal_id']);
        });
    }
};
