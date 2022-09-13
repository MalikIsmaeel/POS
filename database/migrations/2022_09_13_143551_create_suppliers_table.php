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
            $table->string('first_name')->nullable();
            $table->string('meddile_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('company_name')->uniqe();
            
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->unsignedInteger('active');
            $table->foreignId('type_id') // is he company of indivdual
            ->references('id')->on('options')
            ->onDelete('cascade');
            $table->foreignId('location') // is he internal or external
            ->references('id')->on('options')
            ->onDelete('cascade');
            $table->foreignId('user_id')
            ->references('id')->on('users')
            ->onDelete('cascade');
            $table->string('photo')->nullable();
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
