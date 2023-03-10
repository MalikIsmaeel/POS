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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->uniqe();
            $table->string('tax_id')->uniqe();
            $table->string('reqister_id')->uniqe();
            $table->string('phone')->nullable();
            $table->unsignedInteger('active');
         
            $table->foreignId('type_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreignId('internal')->references('id')->on('options')->onDelete('cascade');
            $table->foreignId('sub_city')->references('id')->on('sub_cities')->onDelete('cascade');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('photo')->nullable();
            $table->string('account_id')->nullable(); // for grernal tree accounts
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
        Schema::dropIfExists('suppliers');
    }
};
