<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToComptabiliteDegradationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comptabilite_degradations', function (Blueprint $table) {
            $table->foreign(['client'])->references(['id'])->on('commercial_clients')->onDelete('CASCADE');
            $table->foreign(['conteneur'])->references(['id'])->on('conteneurs')->onDelete('CASCADE');
            $table->foreign(['site'])->references(['id'])->on('commercial_sites')->onDelete('CASCADE');
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
        Schema::table('comptabilite_degradations', function (Blueprint $table) {
            $table->dropForeign('comptabilite_degradations_client_foreign');
            $table->dropForeign('comptabilite_degradations_conteneur_foreign');
            $table->dropForeign('comptabilite_degradations_site_foreign');
        });
    }
}
