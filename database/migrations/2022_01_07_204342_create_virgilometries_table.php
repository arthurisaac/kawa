<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVirgilometriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('virgilometries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->string('nomPrenoms')->nullable();
            $table->time('heureArrivee')->nullable();
            $table->string('typePiece')->nullable();
            $table->string('personneVisitee')->nullable();
            $table->text('motif')->nullable();
            $table->time('heureDepart')->nullable();
            $table->text('observation')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('virgilometries');
    }
}
