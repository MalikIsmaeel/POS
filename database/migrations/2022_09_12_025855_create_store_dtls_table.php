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
            $table->integer('qty');
            $table->string('action_type');
            $table->string('action_owner');
            $table->float('cost');
            $table->unsignedInteger('active');
            $table->foreignId('store_id')
            ->references('id')->on('store_mstrs')
            ->onDelete('cascade');
            $table->foreignId('product_id')
            ->references('id')->on('products')
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
