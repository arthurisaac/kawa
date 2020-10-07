<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseEntreeColisItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_entree_colis_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('totalColis')->default(0);
            $table->string('typeColisSecuripack')->nullable();
            $table->string('typeColisSacjute')->nullable();
            $table->integer('nombreColisSecuripack')->nullable();
            $table->integer('nombreColisSacjute')->nullable();
            $table->string('numeroScelleSecuripack')->nullable();
            $table->string('numeroScelleSacjute')->nullable();
            $table->integer('montantAnnonceSecuripack')->nullable();
            $table->integer('montantAnnonceSacjute')->nullable();
            $table->string('bordereau')->nullable();
            $table->string('expediteur')->nullable();
            $table->foreignId('entreeColis')->references('id')->on('caisse_entree_colis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caisse_entree_colis_items');
    }
}
