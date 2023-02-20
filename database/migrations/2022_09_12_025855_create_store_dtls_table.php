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
        Schema::create('store_dtls', function (Blueprint $table) {
            $table->id();
           
            $table->string('photo')->nullable();
            $table->foreignId('catogery_id')->references('id')->on('catogeries')->onDelete('cascade');
            $table->float('price');
            $table->float('cost');
            $table->unsignedInteger('active');
            $table->foreignId('tax_id')
            ->references('id')->on('options')
            ->onDelete('cascade'); // type of tax is it 15% 5% 0% 
            $table->string('product_name');
            $table->foreignId('store_name')
            ->references('id')->on('store_mstrs')
            ->onDelete('cascade');
            $table->foreignId('unit_id')
            ->references('id')->on('units')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('store_dtls');
    }
};
