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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->date('date');
            $table->string('numero');
            $table->unsignedBigInteger('fournisseur_fk')->index('achat_bon_comandes_fournisseur_fk_foreign');
            $table->integer('numero_da')->nullable()->default(0);
            $table->string('proforma')->nullable();
            $table->string('telephone')->nullable();
            $table->string('operation')->nullable();
            $table->string('objet')->nullable();
            $table->string('total')->nullable();
            $table->string('livraison')->nullable();
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
        Schema::dropIfExists('achat_bon_comandes');
    }
}
