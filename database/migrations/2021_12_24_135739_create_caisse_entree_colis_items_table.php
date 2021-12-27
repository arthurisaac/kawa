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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('site')->index('caisse_entree_colis_items_site_foreign');
            $table->string('autre')->nullable();
            $table->string('nature')->nullable();
            $table->string('scelle')->nullable();
            $table->integer('nbre_colis')->nullable();
            $table->double('montant', 8, 2)->nullable();
            $table->unsignedBigInteger('entree_colis')->index('caisse_entree_colis_items_entree_colis_foreign');
            $table->string('colis')->nullable();
            $table->string('valeur_colis_xof_entree', 100)->nullable();
            $table->string('device_etrangere_dollar_entree', 100)->nullable();
            $table->string('device_etrangere_euro_entree', 100)->nullable();
            $table->string('pierre_precieuse_entree', 100)->nullable();
            $table->string('caisse_entree_devise')->nullable();
            $table->string('caisse_entree_valeur_colis')->nullable();
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
        Schema::dropIfExists('caisse_entree_colis_items');
    }
}
