<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelGestionExplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel_gestion_explications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_demande')->nullable();
            $table->text('motif')->nullable();
            $table->text('sanctions')->nullable();
            $table->unsignedBigInteger('personnel')->index('personnel_gestion_explications_personnel_foreign');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personnel_gestion_explications');
    }
}
