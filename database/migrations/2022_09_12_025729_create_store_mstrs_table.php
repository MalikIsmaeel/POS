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
        Schema::create('store_mstrs', function (Blueprint $table) {
            $table->id();
            
            $table->string('storecode');
           
            $table->unsignedInteger('active');
            $table->foreignId('sub_city_id')
            ->references('id')->on('sub_cities')
            ->onDelete('cascade'); 
            $table->foreignId('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreignId('type')
            ->references('id')->on('options')
            ->onDelete('cascade');
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
        Schema::dropIfExists('store_mstrs');
    }
};
