<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->string('identite')->nullable();
            $table->string('service')->nullable();
            $table->string('nom_demandeur')->nullable();
            $table->string('telephone_demandeur')->nullable();
            $table->string('adresse_electronique_demandeur')->nullable();
            $table->string('objet_achat')->nullable();
            $table->string('famille_achat')->nullable();
            $table->string('sous_famille_achat')->nullable();
            $table->integer('fournisseur_retenu')->nullable();
            $table->bigInteger('montant_retenu')->nullable();
            $table->string('type_demande')->nullable();
            $table->string('nature_demande')->nullable();
            $table->string('numero_da')->nullable();
            $table->string('centre')->nullable();
            $table->string('centre_regional')->nullable();
            $table->string('demande')->nullable();
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
        Schema::dropIfExists('achat_demandes');
    }
}
