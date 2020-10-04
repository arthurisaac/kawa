<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationConfirmationClients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_confirmation_clients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('bordereau')->nullable();
            $table->string('destination')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('scelle')->nullable();
            $table->string('expediteur')->nullable();
            $table->foreignId('client')->references('id')->on('commercial_clients')->onDelete('cascade');
            $table->string('destinataire')->nullable();
            $table->date('dateReception')->nullable();
            $table->string('lieu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_confirmation_client');
    }
}
