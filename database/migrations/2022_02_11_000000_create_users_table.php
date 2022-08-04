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

    // 2022_02_11_000000_create_users_table.php
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->foreignId('role_id');
            $table->foreign('role_id')->references('id')
                ->on('roles')->onDelete('cascade');

            $table->foreignId('gender_id');
            $table->foreign('gender_id')->references('id')
                ->on('genders')->onDelete('cascade');

            $table->string('first_name',25);
            $table->string('middle_name',25);
            $table->string('last_name',25);
            $table->string('email',50)->unique();
            $table->string('password');
            $table->string('display_picture_link',255);
            $table->integer('deleted_flag')->default(0);

            $table->date('modified_at');
            $table->string('modified_by',255)
                ->default('migrated');

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
        Schema::dropIfExists('users');
    }
};
