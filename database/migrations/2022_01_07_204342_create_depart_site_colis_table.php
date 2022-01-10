<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartSiteColisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depart_site_colis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->integer('totalColis')->default(0);
            $table->string('typeColisSecuripack')->nullable();
            $table->string('typeColisSacjute')->nullable();
            $table->integer('nombreColisSecuripack')->nullable();
            $table->integer('nombreColisSacjute')->nullable();
            $table->string('numeroScelleSecuripack')->nullable();
            $table->string('numeroScelleSacjute')->nullable();
            $table->integer('montantAnnonceSecuripack')->nullable();
            $table->integer('montantAnnonceSacjute')->nullable();
            $table->unsignedBigInteger('departSite')->index('depart_site_colis_departsite_foreign');
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
        Schema::dropIfExists('depart_site_colis');
    }
}
