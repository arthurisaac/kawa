<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaisseSortieColisItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caisse_sortie_colis_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->unsignedBigInteger('site')->index('caisse_sortie_colis_items_site_foreign');
            $table->string('autre')->nullable();
            $table->string('nature')->nullable();
            $table->string('scelle')->nullable();
            $table->integer('nbre_colis')->nullable();
            $table->double('montant', 8, 2)->nullable();
            $table->unsignedBigInteger('sortieColis')->index('caisse_sortie_colis_items_sortiecolis_foreign');
            $table->string('colis', 100)->nullable();
            $table->string('valeur_colis_xof_sortie', 100)->nullable();
            $table->string('device_etrangere_dollar_sortie', 100)->nullable();
            $table->string('device_etrangere_euro_sortie', 100)->nullable();
            $table->string('pierre_precieuse_sortie', 100)->nullable();
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
        Schema::dropIfExists('caisse_sortie_colis_items');
    }
}
