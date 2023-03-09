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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date_start_at');
            $table->date('date_end_at');
            $table->text('note');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('status_order_id');
            $table->unsignedBigInteger('client_id');
            $table->boolean('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('status_order_id')->references('id')->on('status_orders');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
