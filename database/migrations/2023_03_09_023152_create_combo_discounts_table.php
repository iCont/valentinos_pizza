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
        Schema::create('combo_discounts', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('combo_id');
            $table->unsignedBigInteger('discount_id');

            $table->foreign('combo_id')->references('id')->on('combos');
            $table->foreign('discount_id')->references('id')->on('discounts');

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
        Schema::dropIfExists('combo_discounts');
    }
};
