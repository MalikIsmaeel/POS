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
        Schema::create('parcode_invoiceentities', function (Blueprint $table) {
            $table->id();
            $table->integer('qty');
            $table->float('cost');
            $table->double('sub_total');
            $table->unsignedInteger('active');
            $table->foreignId('invoice_id')
            ->references('id')->on('parcode_invoices')
            ->onDelete('cascade');
            $table->foreignId('store_id')
            ->references('id')->on('store_dtls')
            ->onDelete('cascade');
            $table->foreignId('unit_id')
            ->references('id')->on('units')
            ->onDelete('cascade');
            $table->double('tax');
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
        Schema::dropIfExists('parcode_invoiceentities');
    }
};