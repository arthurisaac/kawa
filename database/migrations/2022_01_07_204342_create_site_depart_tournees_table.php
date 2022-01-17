<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteDepartTourneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_depart_tournees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('site');
            $table->string('client')->nullable();
            $table->string('type')->nullable();
            $table->string('tdf')->nullable();
            $table->string('caisse')->nullable();
            $table->integer('montant')->nullable();
            $table->string('colis')->nullable();
            $table->double('valeur_colis')->nullable();
            $table->double('valeur_autre')->nullable();
            $table->unsignedBigInteger('idTourneeDepart')->index('site_depart_tournees_idtourneedepart_foreign');
            $table->string('nature')->nullable();
            $table->integer('nbre_colis')->nullable();
            $table->text('numero_scelle')->nullable();
            $table->double('montant_regulation')->nullable();
            $table->string('autre')->nullable();
            $table->string('numero')->nullable();
            $table->string('bordereau')->nullable();
            $table->string('valeur_colis_xof')->nullable();
            $table->string('device_etrangere_dollar')->nullable();
            $table->string('device_etrangere_euro')->nullable();
            $table->string('pierre_precieuse')->nullable();
            $table->string('valeur_colis_xof_transport_depart')->nullable();
            $table->string('device_etrangere_dollar_transport_depart')->nullable();
            $table->string('device_etrangere_euro_transport_depart')->nullable();
            $table->string('pierre_precieuse_transport_depart')->nullable();
            $table->string('numero_transport_depart')->nullable();
            $table->string('nbre_colis_transport_depart')->nullable();
            $table->string('valeur_colis_xof_arrivee', 100)->nullable();
            $table->string('device_etrangere_dollar_arrivee', 100)->nullable();
            $table->string('device_etrangere_euro_arrivee', 100)->nullable();
            $table->string('pierre_precieuse_arrivee', 100)->nullable();
            $table->string('numero_arrivee', 100)->nullable();
            $table->integer('nbre_colis_arrivee')->nullable();
            $table->string('colis_arrivee', 100)->nullable();
            $table->string('transport_arrivee_devise')->nullable();
            $table->string('transport_arrivee_valeur_colis')->nullable();
            $table->string('regulation_depart_valeur_colis')->nullable();
            $table->string('regulation_depart_devise')->nullable();
            $table->string('regulation_arrivee_valeur_colis')->nullable();
            $table->string('regulation_arrivee_devise')->nullable();
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
        Schema::dropIfExists('site_depart_tournees');
    }
}
