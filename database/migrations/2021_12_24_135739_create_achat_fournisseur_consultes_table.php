<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatFournisseurConsultesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_fournisseur_consultes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('fournisseur');
            $table->string('cotation_technique');
            $table->bigInteger('prix_propose');
            $table->string('choix');
            $table->unsignedBigInteger('achat_demandes_fk')->index('achat_fournisseur_consultes_achat_demandes_fk_foreign');
            $table->foreignId('localisation_id')->references('id')->on('localisations')->OnUpdate('CASCADE')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_fournisseur_consultes');
    }
}
