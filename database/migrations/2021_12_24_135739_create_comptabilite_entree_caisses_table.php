<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteEntreeCaissesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_entree_caisses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->integer('somme')->nullable();
            $table->text('motif')->nullable();
            $table->string('deposant')->nullable();
            $table->string('service')->nullable();
            $table->string('centre', 100)->nullable();
            $table->string('centre_regional', 100)->nullable();
            $table->string('mouvement', 100)->nullable();
            $table->string('justification', 100)->nullable();
            $table->string('montant_justifie', 100)->nullable();
            $table->string('montant_non_justifie', 100)->nullable();
            $table->foreign(['localisation_id'])->references(['id'])->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptabilite_entree_caisses');
    }
}
