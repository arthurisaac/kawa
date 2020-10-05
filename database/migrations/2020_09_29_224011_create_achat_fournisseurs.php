<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatFournisseurs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('societe')->nullable();
            $table->string('civilite')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('pays')->nullable();
            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->text('observation')->nullable();
            $table->string('domaine')->nullable();
            $table->string('delaiLivraison')->nullable();
            $table->string('conditionPaiement')->nullable();
            $table->string('numeroAgrement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_fournisseur');
    }
}
