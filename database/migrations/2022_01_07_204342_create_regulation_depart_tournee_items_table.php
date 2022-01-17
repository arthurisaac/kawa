<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegulationDepartTourneeItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regulation_depart_tournee_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('regulation_depart')->index('regulation_depart_tournee_items_regulation_depart_foreign');
            $table->unsignedBigInteger('site')->index('regulation_depart_tournee_items_site_foreign');
            $table->string('client')->nullable();
            $table->string('nature')->nullable();
            $table->integer('nbre_colis')->default(0);
            $table->string('numero_scelle')->nullable();
            $table->double('montant', 8, 2)->default(0);
            $table->timestamps();
            $table->string('autre')->nullable();
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
        Schema::dropIfExists('regulation_depart_tournee_items');
    }
}
