<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('olahans', function (Blueprint $table) {
            $table->unsignedBigInteger('pipa_id');

            $table->foreign('pipa_id')->references('id')->on('pipas')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('olahans', function (Blueprint $table) {
            $table->dropForeign(['pipa_id']);
            $table->dropColumn(['pipa_id']);
        });
    }
};
