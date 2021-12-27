<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAchatFournisseurConsultesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achat_fournisseur_consultes', function (Blueprint $table) {
            $table->foreign(['achat_demandes_fk'])->references(['id'])->on('achat_demandes')->onDelete('CASCADE');
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
        Schema::table('achat_fournisseur_consultes', function (Blueprint $table) {
            $table->dropForeign('achat_fournisseur_consultes_achat_demandes_fk_foreign');
        });
    }
}
