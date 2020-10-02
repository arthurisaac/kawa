<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComptabiliteSortieCaisses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comptabilite_sortie_caisses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('date');
            $table->integer('somme')->nullable();
            $table->text('motif')->nullable();
            $table->string('beneficiaire')->nullable();
            $table->string('service')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comptabilite_sortie_caisses');
    }
}
