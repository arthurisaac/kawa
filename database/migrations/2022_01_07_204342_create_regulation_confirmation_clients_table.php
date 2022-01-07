<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationConfirmationClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_confirmation_clients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('bordereau')->nullable();
            $table->string('destination')->nullable();
            $table->integer('montant')->nullable();
            $table->integer('scelle')->nullable();
            $table->string('expediteur')->nullable();
            $table->unsignedBigInteger('client')->nullable()->index('regulation_confirmation_clients_client_foreign');
            $table->string('destinataire')->nullable();
            $table->date('dateReception')->nullable();
            $table->string('lieu')->nullable();
            $table->text('confirmation')->nullable();
            $table->string('remarque', 100)->nullable();
            $table->string('devise', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_confirmation_clients');
    }
}
