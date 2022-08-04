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

    // 2022_02_12_232546_create_orders_table.php
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('account_id');
            $table->foreign('account_id')->references('id')->on('users')->onDelete('cascade');

            $table->foreignId('ebook_id');
            $table->foreign('ebook_id')->references('id')->on('e_books')->onDelete('cascade');

            $table->date('order_date');

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
        Schema::dropIfExists('orders');
    }
};
