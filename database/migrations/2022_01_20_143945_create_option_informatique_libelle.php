<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionInformatiqueLibelle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_informatique_libelles', function (Blueprint $table) {
            $table->id();
            $table->string('libelle')->nullable();
            $table->foreignId('categorie_id')->nullable()->references('id')->on('option_informatique_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('location')->nullable()->references('id')->on('locations')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('option_informatique_libelles');
    }
}
