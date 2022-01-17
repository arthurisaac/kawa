<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVidangeCourroiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vidange_courroies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->integer('idVehicule');
            $table->integer('kmActuel');
            $table->integer('prochainKm');
            $table->integer('courroie')->nullable();
            $table->string('courroieMarque')->nullable();
            $table->integer('courroieKm')->nullable();
            $table->string('courroieFournisseur')->nullable();
            $table->integer('courroieMontant')->nullable();
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
        Schema::dropIfExists('vidange_courroies');
    }
}
