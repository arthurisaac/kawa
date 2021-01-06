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
            $table->id();
            $table->timestamps();
            $table->string('fournisseur');
            $table->string('cotation_technique')->nullable();
            $table->bigInteger('prix_propose')->nullable();
            $table->string('choix')->nullable();
            $table->foreignId('achat_demandes_fk')->references('id')->on('achat_demandes')->onDelete('cascade');
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
