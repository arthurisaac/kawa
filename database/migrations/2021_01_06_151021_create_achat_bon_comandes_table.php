<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatBonComandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_bon_comandes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->string('numero');
            $table->foreignId('fournisseur_fk')->references('id')->on('achat_fournisseurs')->onDelete('cascade');
            $table->foreignId('numero_da')->references('numero_da')->on('achat_demandes')->onDelete('cascade');
            $table->string('proforma')->nullable();
            $table->string('telephone')->nullable();
            $table->string('operation')->nullable();
            $table->string('objet')->nullable();
            $table->string('total')->nullable();
            $table->string('livraison')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_bon_comandes');
    }
}
