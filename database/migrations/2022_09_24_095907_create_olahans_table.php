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
        Schema::create('olahans', function (Blueprint $table) {
            $table->id();
            $table->string('ntv_baku', 50);
            $table->string('ph_baku', 50);
            $table->string('ntv_sendimen', 50);
            $table->string('ph_sendimen', 50);
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
        Schema::dropIfExists('olahans');
    }
};
