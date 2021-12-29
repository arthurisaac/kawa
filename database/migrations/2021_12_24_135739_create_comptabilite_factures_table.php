<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('numeroFacture');
            $table->unsignedBigInteger('client')->index('comptabilite_factures_client_foreign');
            $table->string('periode')->nullable();
            $table->double('montant')->nullable();
            $table->date('dateDepot')->nullable();
            $table->date('dateEcheance')->nullable();
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
        Schema::dropIfExists('comptabilite_factures');
    }
}
