<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseBilletagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_billetages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('ctv')->references('id')->on('caisse_ctvs');
            $table->integer('ba_nb10000')->nullable();
            $table->integer('ba_nb5000')->nullable();
            $table->integer('ba_nb2000')->nullable();
            $table->integer('ba_nb1000')->nullable();
            $table->integer('ba_nb500')->nullable();
            $table->integer('ba_nb250')->nullable();
            $table->integer('ba_nb200')->nullable();
            $table->integer('ba_nb100')->nullable();
            $table->integer('ba_nb50')->nullable();
            $table->integer('ba_nb25')->nullable();
            $table->integer('ba_nb10')->nullable();
            $table->integer('ba_nb5')->nullable();
            $table->integer('ba_nb1')->nullable();
            $table->integer('br_nb10000')->nullable();
            $table->integer('br_nb5000')->nullable();
            $table->integer('br_nb2000')->nullable();
            $table->integer('br_nb1000')->nullable();
            $table->integer('br_nb500')->nullable();
            $table->integer('br_nb250')->nullable();
            $table->integer('br_nb200')->nullable();
            $table->integer('br_nb100')->nullable();
            $table->integer('br_nb50')->nullable();
            $table->integer('br_nb25')->nullable();
            $table->integer('br_nb10')->nullable();
            $table->integer('br_nb5')->nullable();
            $table->integer('br_nb1')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_billetages');
    }
}
