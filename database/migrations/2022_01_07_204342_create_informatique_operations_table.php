<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformatiqueOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informatique_operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('centre')->nullable();
            $table->string('centreRegional')->nullable();
            $table->string('service')->nullable();
            $table->date('date')->nullable();
            $table->string('materielDefectueux')->nullable();
            $table->text('rapportMateriel')->nullable();
            $table->date('dateDebut')->nullable();
            $table->date('dateFin')->nullable();
            $table->string('operationEffectuee')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informatique_operations');
    }
}
