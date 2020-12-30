<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAchatFournisseurCASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achat_fournisseur_c_a_s', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('fournisseur_fk')->references('id')->on('achat_fournisseurs')->onDelete('cascade');
            $table->bigInteger('ca');
            $table->string('annee');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achat_fournisseur_c_a_s');
    }
}
